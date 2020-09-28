<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PlanPays extends Model
{
      protected $table ='plan_pays';

    public $timestamps = false;

    protected $guarded = ['id'];

   /// relation entre pays et planpays
    public function pays(){
    	return $this->belongsTo(Pays::class, 'pays_id','id');
    }
     /// relation entre planpays et children

    public function children(){
    	return $this->hasMany(PlanPays::class, 'parent');
    }
}
