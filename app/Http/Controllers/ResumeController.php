<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;
use App\Candidate;
use App\User;
use App\Links;
use App\Candidate_Skill;
use App\Candidate_Exp;
use App\Candidate_Member;
use App\Candidate_Achieve;
use App\Candidate_Educ;

class ResumeController extends Controller
{
    public function addAboutMe(Request $request)
    {

        $resume = Resume::where('candidate_id', $request->candidate_id)
                ->update(['intro' => $request->intro, 'url' => $request->url]);
      /*  $resume->intro = $request->intro;
        $resume->url = $request->url;
        $resume->save();*/

        return redirect('/dashboard#profile')->with(['abt' => 'success', 'header' => 'Success!', 'msg' => 'Changes saved.']);
    }

    public function viewResume1($url)
    {
        $resume = Resume::where('url', $url)->first();
        $candidate_id = $resume->candidate_id;
        $candidate = Candidate::where('candidate_id', $candidate_id)->first();
        $user = User::find($candidate->user_id);
        $links = Links::where('user_id', $user->id)->get();
        $skills = Candidate_Skill::where('user_id', $user->id)->get();
        $experience = Candidate_Exp::where('user_id', $user->id)->get();
        $membership = Candidate_Member::where('user_id', $user->id)->get();
        $achievement = Candidate_Achieve::where('user_id', $user->id)->get();
        $education = Candidate_Educ::where('user_id', $user->id)->get();

        return view('Resumes/Classic 2/index')->with(['candidate' => $candidate, 'resume' => $resume, 'user' => $user, 'links' => $links, 'skills' => $skills,
                'experience' => $experience, 'membership' => $membership, 'achievement' => $achievement, 'education' => $education]);
        //return $links;
    }

    public function viewResume2($url)
    {
        $resume = Resume::where('url', $url)->first();
        $candidate_id = $resume->candidate_id;
        $candidate = Candidate::where('candidate_id', $candidate_id)->first();
        $user = User::find($candidate->user_id);
        $links = Links::where('user_id', $user->id)->get();
        $skills = Candidate_Skill::where('user_id', $user->id)->get();
        $experience = Candidate_Exp::where('user_id', $user->id)->get();
        $membership = Candidate_Member::where('user_id', $user->id)->get();
        $achievement = Candidate_Achieve::where('user_id', $user->id)->get();
        $education = Candidate_Educ::where('user_id', $user->id)->get();

        return view('Resumes/Creative2/creative')->with(['candidate' => $candidate, 'resume' => $resume, 'user' => $user, 'links' => $links, 'skills' => $skills,
        'experience' => $experience, 'membership' => $membership, 'achievement' => $achievement, 'education' => $education]);
    }
}
