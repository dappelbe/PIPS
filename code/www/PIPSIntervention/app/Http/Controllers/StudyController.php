<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;
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
            'apiurl' => 'required'
        ]);

        $input = $request->all();

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

}
