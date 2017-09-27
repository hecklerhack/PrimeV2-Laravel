<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Category extends Model
{
    //
    protected $table = 'job_category';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
