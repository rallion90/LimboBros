<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $primaryKey = 'product_id';

    protected $table = "products";

    public $timestamps = false;

    protected $fillable = ['product_id', 
    	'product_image', 'product_name', 'product_category', 'product_stock', 'product_price', 'product_length', 'product_width', 'product_weight', 'product_description'
    ];

    public function cat(){
    	return $this->belongsTo(Category::class, 'product_category');
    }
}
