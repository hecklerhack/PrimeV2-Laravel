<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Job Finder';
        //return view('pages.index', compact('title'));
        return view('index')->with('title1', $title);
    }

    public function clogin()
    {
        return view('pages.candidates.clogin');
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
