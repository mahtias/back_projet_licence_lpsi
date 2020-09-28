<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
      protected $table = 'carburants';

    public $timestamps = false;

    protected $guarded = ['id'];
}
