<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnneeMission extends Model
{
      protected $table = 'annee_missions';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function mission(){
    	return $this->hasMany(misions::class, 'id');
    }
}