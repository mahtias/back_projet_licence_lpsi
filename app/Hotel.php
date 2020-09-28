<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $table = 'hotels';

    public $timestamps = false;

    protected $guarded = ['id'];
}