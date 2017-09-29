<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;

class LinkController extends Controller
{
    //
    public function store(Request $request)
    {
        $links = new Links;
        $links->website = $request->web;
        $links->link = $request->url;
        $links->user_id = $request->user_id;
        $link = $links->website;
        $links->save();

        return redirect('/dashboard#profile')->with(['link' => 'success', 'header' => 'Success!', 'msg' => $link]);
    }
}
