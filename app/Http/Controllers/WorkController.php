<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Candidate_Exp;
class WorkController extends Controller
{
    //
    public function store(Request $request)
    {
        $exp = new Candidate_Exp;
        $exp->company = $request->name;
        $exp->position = $request->pos;
        $exp->industry = $request->industry;
        $exp->field_of_study = $request->field;
        $exp->year_entered = $request->from;
        $exp->year_ended = $request->to;
        $exp->location = $request->location;
        $exp->user_id = $request->user_id;
        $exp->description = $request->des;

        $work = $exp->position;
        $exp->save();

        return redirect('/dashboard#profile')->with(['work_edit' => 'success', 'header' => 'Success!', 'msg' => $work.' has been added.']);
    }
}
