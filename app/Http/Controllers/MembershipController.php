<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate_Member;

class MembershipController extends Controller
{
    //
    public function store(Request $request)
    {
        $member = new Candidate_Member;
        $member->assoc = $request->assoc;
        $member->date_entered = $request->from;
        $member->date_ended = $request->to;
        $member->description = $request->des;
        $member->user_id = $request->user_id;
        $assoc = $member->assoc;
        $member->save();

        return redirect('/dashboard#profile')->with(['mem' => 'success', 'header' => 'Success!', 'msg' => $assoc]);
    }
}
