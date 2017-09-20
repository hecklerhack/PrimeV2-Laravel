<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //
    protected $table = 'users_links';
    protected $primaryKey = 'no';
    public $timestamps = false;
}
