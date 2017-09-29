<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\User;
use App\Resume;
use App\Links;
use App\Candidate_Educ;
use App\Candidate_Exp;
use App\Candidate_Achieve;
use App\Candidate_Member;
use App\Candidate_Skill;
use App\Location;
use App\Job_Category;
use App\Latest_Position;
use App\Industry;
use App\City;
use App\Skills;

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
        $links = Links::where('user_id', $user_id)->get();
        $candidate_educ = Candidate_Educ::where('user_id', $user_id)->get();
        $candidate_exp = Candidate_Exp::where('user_id', $user_id)->get();
        $candidate_achieve = Candidate_Achieve::where('user_id', $user_id)->get();
        $candidate_member = Candidate_Member::where('user_id', $user_id)->get();
        $candidate_skills = Candidate_Skill::where('user_id', $user_id)->get();
        $location = Location::all();
        $job_category = Job_Category::all(); //Job_Category
        $position = Latest_Position::all();
        $industry = Industry::all();
        $cities = City::all();
        $skills = Skills::all();
       return view('pages.candidates.dashboard')->with(['user' => $user, 'candidate' => $candidate, 'resume' => $resume, 'links' => $links, 'candidate_educ' => $candidate_educ, 'candidate_exp' => $candidate_exp,
        'candidate_achieve' => $candidate_achieve, 'candidate_member' => $candidate_member, 'candidate_skills' => $candidate_skills, 'location' => $location, 'job_category' => $job_category, 'position' => $position, 'industry' => $industry,
        'cities' => $cities, 'skills' => $skills]);
        //return $position;
    }
}
