<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $table = 'activites';

    public $timestamps = false;

    protected $guarded = ['id'];
}

