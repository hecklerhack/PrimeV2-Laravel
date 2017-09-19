<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\User;
use App\Resume;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $candidate = Candidate::where('user_id', $user_id)->first(); 
        $user = User::find($user_id);
        $resume = Resume::where('candidate_id', $candidate->candidate_id)->first();
        return view('pages.candidates.dashboard')->with(['user' => $user, 'candidate' => $candidate, 'resume' => $resume]);
    }
}
