<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
      protected $table = 'personnels';

    public $timestamps = false;

    protected $guarded = ['id'];


    // relation entre personnel et fonction
    public function fonction(){
     return $this->belongsTo(Fonction::class, 'fonction_id', 'id');
    }

    public function missions(){
    	return $this->hasMany(misions::class, 'id');
    }
}
