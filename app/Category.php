<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
	protected $primaryKey = 'category_id';

    protected $table = 'category';

    public $timestamps = false;

    protected $fillable = ['category_id', 'category_name'];

    

    
}
