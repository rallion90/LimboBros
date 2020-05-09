<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MunicipalityAdmin extends Model
{
    //
    protected $primaryKey = 'citymunCode';

    protected $table = "refcitymun";

    public $timestamps = false;

    protected $fillable = ['citymunCode', 'citymunDesc',  'provCode'];
}
