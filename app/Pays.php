<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
        protected $table = 'pays';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function plan_pays(){
    	return $this->hasMany(PlanPays::class, 'pays_id', 'id');
    }
}
