<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['id', 'name', 'quantity', 'price', 'stock', 'image', 'description', 'properties', 'uses'];
}
