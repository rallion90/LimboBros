<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    //
    protected $table = "refcitymun";

    public $timestamps = false;

    protected $fillable = ['citymunDesc', 'provCode', 'citymunCode'];
}
