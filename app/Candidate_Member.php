<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_Member extends Model
{
    //
    protected $table = 'tbl_membership';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
