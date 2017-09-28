<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public $table = 'tbl_city';
    public $primaryKey = 'id';
    public $timestamps = false;
}
