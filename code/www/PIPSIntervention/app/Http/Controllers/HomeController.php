<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function root()
    {
        return redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = "PIPs: Dashboard";
        //-- Page Info
        $studyName = "TRANSLATE";
        $studyEmail = "translate@ndorms.ox.ac.uk";
        $randoNum = "TR-OUH-100001";
        $siteName = "Churchill Hospital, Oxford";
        $allocation = "LATP biopsy";
        $recruitNumber = "101<sup>st</sup>";
        //-- Last login
        $lastLogin = "Never";
        $tmp = User::where('id', '=', Auth::user()->id)->first();
        if ( !is_null($tmp->last_login_at ) ) {
            $lastLogin = date('l d F Y', strtotime($tmp->last_login_at)) . ' at ' . date('H:i', strtotime($tmp->last_login_at));
        }
        return view('home.home')
            ->with('lastLogin', $lastLogin)
            ->with('studyName', $studyName)
            ->with('studyEmail', $studyEmail)
            ->with('randoNum', $randoNum)
            ->with('siteName', $siteName)
            ->with('allocation', $allocation)
            ->with('recruitNumber', $recruitNumber)
            ->with('pageTitle', $pageTitle);
    }
}
