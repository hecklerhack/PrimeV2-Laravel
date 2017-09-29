<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate_Skill;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $skill = new Candidate_Skill;
        $skill->skills = $request->name;
        $skill->user_id = $request->user_id;
        $skill->percent = $request->percent;
        $sk = $skill->skills;

        $skill->save();

        return redirect('/dashboard#profile')->with(['skl' => 'success', 'header' => 'Success!', 'msg' => $sk]);
    }
}
