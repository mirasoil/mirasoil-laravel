<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
}
