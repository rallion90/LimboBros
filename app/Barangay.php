<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    //
    //protected $primaryKey = 'brgyCode';

    protected $table = "refbrgy";

    public $timestamps = false;

    protected $fillable = ['brgyCode', 'brgyDesc', 'regCode', 'provCode', 'citymunCode'];
}


