<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class StudyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:study-list|study-create|study-edit|study-delete', ['only' => ['index','store']]);
        $this->middleware('permission:study-create', ['only' => ['create','store']]);
        $this->middleware('permission:study-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:study-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Study::orderBy('id','DESC')->paginate(5);
        return view('study.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('study.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'studyname' => 'required',
            'studyemail' => 'required|email|unique:users,email',
            'apiurl' => 'required',
            'apikey' => 'required',
            'studylogo' => 'required',
            'studyphone' => 'required',
            'uploadedpis' => 'required',
            'studyrandomisationreportid' => 'required',
            'randonumfield' => 'required',
            'allocationfield' => 'required',
            'studystatusreportid' => 'required',
            'studyaddress' => 'required',
            'sitenamefield' => 'required',
            'studyaccruallink' => 'required',
            'expectedrecruits' => 'required',
            'randodatefield' => 'required',
        ]);

        $input = $request->all();
        unset( $input['_token'] );

        if ( !str_ends_with($input['apiurl'], '/')) {
            $input['apiurl'] .= '/';
        }

        $files = $request->file('studylogo');
        if ( !empty($files)) {
            $name = $files[0]->getClientOriginalName();
            $input['studylogo'] = $name;
            try {
                Storage::put('public/images/' . $name, file_get_contents($files[0]));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        $files2 = $request->file('uploadedpis');
        if ( !empty($files2)) {
            $isFirst = true;
            foreach( $files2 as $myfile ) {
                $name = $myfile->getClientOriginalName();
                if ( $isFirst ) {
                    $input['uploadedpis'] = $name;
                    $isFirst = false;
                } else {
                    $input['uploadedpis'] .= '|' . $name;
                }
                try {
                    Storage::put('public/pis/' . $name, file_get_contents($myfile));
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }

            }
        }
        $input['uploadedpis'] = 1;
        $study = Study::create($input);

        return redirect()->route('study.index')
            ->with('success','Study created successfully');
    }

}
