<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
     protected $table = 'fonctions';

    public $timestamps = false;

    protected $guarded = ['id'];


    /// relation entre la fonction et personnel

    public function personnel(){
    	return $this->hasMany(Personnel::class, 'id');
    }
}
