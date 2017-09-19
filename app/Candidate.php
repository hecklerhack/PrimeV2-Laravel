<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';
    protected $primaryKey = 'candidate_id';
    public $timestamps = false;
}
