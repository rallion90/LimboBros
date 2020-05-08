<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    //
    protected $primaryKey = 'citymunCode';

    protected $table = "refcitymun";

    public $timestamps = false;

    protected $fillable = ['citymunDesc',  'provCode'];
}
