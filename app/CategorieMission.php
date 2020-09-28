<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieMission extends Model
{
     protected $table = 'categorie_missions';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function mission(){
    	return $this->hasMany(misions::class, 'id');
    }
}
