<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = "refprovince";

    public $timestamps = false;

    protected $fillable = ['provDesc', 'provCode'];
}
