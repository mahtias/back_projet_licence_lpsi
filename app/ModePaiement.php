<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModePaiement extends Model
{
    protected $table = 'mode_paiements';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function missions(){
    	return $this->hasMany(misions::class, 'id');
    }
}
