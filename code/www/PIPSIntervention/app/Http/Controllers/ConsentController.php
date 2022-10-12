<?php

namespace App\Http\Controllers;

use App\Models\ConsentForm;
use App\Models\Study;
use App\Models\User;
use App\Utilities\RetrieveREDCapData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ConsentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['pips', 'store', 'pdf']]);
        $this->middleware('permission:consent-list|consent-create|consent-edit|consent-delete', ['only' => ['list']]);
        $this->middleware('permission:consent-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:consent-delete', ['only' => ['destroy']]);
    }

    public function pips()
    {
        $pageTitle = "PIPs: Consent Form";
        return view('consentforms.pips')
            ->with('pageTitle', $pageTitle);
    }

    public function store(Request $request) {
        $pageTitle = "PIPs: Consent Form";

        $row = new ConsentForm();
        $row->pis = $request['pis'];
        $row->voluntary = $request['voluntary'];
        $row->data = $request['data'];
        $row->agree = $request['agree'];
        $row->name = $request['name'];
        $row->consentdate = $request['consentdate'];
        $row->ppt_signature = request()->ip();

        $row->created_at = date("Y-m-d H:i:s");
        $row->updated_at = date("Y-m-d H:i:s");

        $row->study_id = $request['study_id'];
        $row->record_id = $request['record_id'];

        $row->takenby = '';
        $row->checkdate = '1900-01-01 00:01:00';
        $row->research_sig = '';

        $row->save();

        return redirect(route('consentforms.pips'))
            ->with('status', 'Consent form data received, the researcher will tell you what to do next.')
            ->with('pageTitle', $pageTitle);
    }

    public function list() {
        $pageTitle = "PIPs: Consent Form Status";
        $data = ConsentForm::List();
        $allUsers = User::orderBy('id','DESC')->get();
        $hasAccounts = array();
        foreach( $allUsers as $u ) {
            if ( !in_array($u->randomisation_number, $hasAccounts) ){
                array_push($hasAccounts, $u->randomisation_number);
            }
        }


        return view('consentforms.list')
            ->with('data', $data)
            ->with('hasAccounts', $hasAccounts)
            ->with('pageTitle', $pageTitle);
    }

    public function destroy($id)
    {
        DB::table("consentform")->where('id',$id)->delete();
        return redirect()->route('consentforms.pips.list')
            ->with('success','Form deleted successfully');
    }

    public function edit($id)
    {
        $cf = ConsentForm::find($id);

        $studies = Study::all()->toArray();

        return view('consentforms.edit')
            ->with('studies', $studies)
            ->with('row', $cf);
    }

    public function view($id)
    {
        $cf = ConsentForm::find($id);

        $studies = Study::all()->toArray();

        return view('consentforms.view')
            ->with('studies', $studies)
            ->with('row', $cf);
    }

    public function update(Request $request, $id)
    {

        $cf = ConsentForm::find($id);
        $cf->takenby = Auth::user()->name;
        $cf->research_sig = request()->ip();
        $cf->study_id = $request['study_id'];
        $cf->record_id = $request['record_id'];
        $cf->save();

        return redirect()->route('consentforms.pips.list')
            ->with('success','Form updated successfully');
    }

    public function createaccount($id) {
        $myConsentForm = ConsentForm::find($id);
        $roles = Role::pluck('name','name')->all();
        return view('users.createuser',compact('roles', 'myConsentForm'));
    }

}
