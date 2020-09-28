<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenTransport extends Model
{
         protected $table = 'moyen_transports';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function missions(){
    	return $this->hasMany(misions::class, 'id');
    }
}
