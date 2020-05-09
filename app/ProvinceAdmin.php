<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinceAdmin extends Model
{
    //
    protected $primaryKey = 'provCode';

    protected $table = "refprovince";

    public $timestamps = false;

    protected $fillable = ['provCode', 'provDesc', 'regCode'];
}
