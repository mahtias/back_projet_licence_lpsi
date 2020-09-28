<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormeMission extends Model
{
     protected $table = 'norme_missions';

    public $timestamps = false;

    protected $guarded = ['id'];
}
