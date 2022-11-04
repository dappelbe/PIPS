<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:study-list|study-create|study-edit|study-delete', ['only' => ['index','store']]);
        $this->middleware('permission:study-create', ['only' => ['create','store']]);
        $this->middleware('permission:study-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:study-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Study::orderBy('id', 'DESC')->paginate(5);
        return view('study.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('study.create');
    }

    public function destroy(int $studyID)
    {
        $study = Study::findorfail($studyID);

        if (!is_null($study)) {
            $study->delete();
        }

        return redirect(route('study.index'));
    }

    public function show(int $studyID)
    {
        $data = Study::where('id', '=', $studyID)->first();
        if (is_null($data)) {
            abort(404);
        } else {
            return view('study.edit')
                ->with('readonly', 'readonly')
                ->with('data', $data);
        }
    }

    public function edit(int $studyID)
    {
        $data = Study::where('id', '=', $studyID)->first();
        if (is_null($data)) {
            abort(404);
        } else {
            return view('study.edit')
                ->with('readonly', '')
                ->with('data', $data);
        }
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
            'potentialrecruitsreport' => 'required',
            'consent_event' => 'required',
            'consent_instrument' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);

        if (!str_ends_with($input['apiurl'], '/')) {
            $input['apiurl'] .= '/';
        }

        $files = $request->file('studylogo');
        if (!empty($files)) {
            $name = $files->getClientOriginalName();
            $input['studylogo'] = $name;
            try {
                $files->move('images', $files->getClientOriginalName());
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        $files2 = $request->file('uploadedpis');
        if (!empty($files2)) {
            $isFirst = true;
            foreach ($files2 as $myfile) {
                $name = $myfile->getClientOriginalName();
                if ($isFirst) {
                    $input['uploadedpis'] = $name;
                    $isFirst = false;
                } else {
                    $input['uploadedpis'] .= '|' . $name;
                }
                try {
                    $myfile->move('pis', $myfile->getClientOriginalName());
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }

            }
        }

        if (array_key_exists('id', $input) && $input['id'] != '') {
            $study = Study::findorfail($input['id']);
            $study->update($input);
        } else {
            $study = Study::create($input);
        }

        return redirect()->route('study.index')
            ->with('success', 'Study created successfully');
    }

}
