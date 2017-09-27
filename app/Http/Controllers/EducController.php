<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Candidate_Educ;

class EducController extends Controller
{
    public function store(Request $request)
    {
        $educ = new Candidate_Educ;
        $educ->level = $request->level;
        $educ->school = $request->name;
        $educ->location = $request->location;
        $educ->year_entered = $request->from;
        $educ->year_ended = $request->to;
        $educ->user_id = $request->user_id;
        $educ->degree = $request->degree;
        $educ->show_resume_1 = 1;
        $educ->show_resume_2 = 1;
        $educ->show_resume_3 = 1;
        $school = $educ->school;

        $educ->save();

        return redirect('/dashboard#profile')->with(['sch' => 'success', 'header' => 'Success!', 'msg' => $school.' has been added to your profile']);
    }
}
