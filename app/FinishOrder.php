<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishOrder extends Model
{
    //
    protected $primaryKey = 'fid';

    protected $table = "finish_orders";

    public $timestamps = false;

    protected $fillable = ['order_number', 'total', 'delivered_at'];
}
