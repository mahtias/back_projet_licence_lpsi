<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituationMatrimoniale extends Model
{
     protected $table = 'situation_matrimoniales';

    public $timestamps = false;

    protected $guarded = ['id'];
}
