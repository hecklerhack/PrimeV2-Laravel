<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate_Achieve;

class AchievementController extends Controller
{
    public function store(Request $request)
    {
        $achieve = new Candidate_Achieve;
        $achieve->title = $request->title;
        $achieve->year = $request->year;
        $achieve->description = $request->des;
        $achieve->user_id = $request->user_id;
        $title = $achieve->title;

        $achieve->save();

        return redirect('/dashboard#profile')->with(['achieve' => 'success', 'header' => 'Success!', 'msg' => $title.' has been added to your profile']);
    }
}
