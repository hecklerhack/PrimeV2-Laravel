<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_Skill extends Model
{
    //
    protected $table = 'candidate_skills';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
