<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_fname', 'billing_lname', 'billing_email', 'billing_phone','billing_address',
        'billing_county', 'billing_locality', 'billing_zipcode', 'billing_total', 'shipped'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}
