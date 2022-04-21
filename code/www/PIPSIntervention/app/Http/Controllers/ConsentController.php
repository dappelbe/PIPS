<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Postrequests\PIPSConsentFormRequest;
use App\Models\ConsentForm;
use Illuminate\Http\Request;

class ConsentController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:consent-list|consent-create|consent-edit|consent-delete', ['only' => ['list']]);
        //$this->middleware('permission:consent-create', ['only' => ['create','store']]);
        $this->middleware('permission:consent-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:consent-delete', ['only' => ['destroy']]);
    }

    /***
     * Handle Get requests for the PIPS consent form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pips() {
        $pageTitle = "PIPs: Consent Form";
        return view('consentforms.pips')
            ->with('pageTitle', $pageTitle);
    }

    public function store(Request $request) {
        $pageTitle = "PIPs: Consent Form";

        $validated = $request->validate([
            'pis' => 'required',
            'voluntary' => 'required',
            'data' => 'required',
            'agree' => 'required',
            'name' => 'required',
            'consentdate' => 'required',
        ]);

        $row = new ConsentForm();
        $row->pis = $request['pis'];
        $row->voluntary = $request['voluntary'];
        $row->data = $request['data'];
        $row->agree = $request['agree'];
        $row->name = $request['name'];
        $row->consentdate = $request['consentdate'];
        $row->ppt_signature = request()->ip();;

        $row->created_at = date("Y-m-d H:i:s");
        $row->updated_at = date("Y-m-d H:i:s");

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
        return view('consentforms.list')
            ->with('data', $data)
            ->with('pageTitle', $pageTitle);
    }

}
