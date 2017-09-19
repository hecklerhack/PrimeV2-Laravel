<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_location;
use Illuminate\Support\Facades\DB;

class CandidateRegister extends Controller
{
    public function create()
    {
        $locations = tbl_location::pluck('id', 'city', 'province');
        return view('auth.register')->with('locations', $locations);
    }
}
