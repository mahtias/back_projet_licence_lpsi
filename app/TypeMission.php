<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMission extends Model
{
      protected $table = 'type_missions';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function missions(){
    	return $this->hasMany(misions::class, 'id');
    }
}
