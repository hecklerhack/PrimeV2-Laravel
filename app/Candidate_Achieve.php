<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_Achieve extends Model
{
    //
    protected $table = 'tbl_achievements';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
