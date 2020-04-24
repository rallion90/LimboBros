<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'customer';

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'customer_fname', 'customer_mname', 'customer_lname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
}
