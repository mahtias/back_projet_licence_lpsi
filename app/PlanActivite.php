<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanActivite extends Model
{
    protected $table ='plan_activites';

    public $timestamps = false;

    protected $guarded = ['id'];

     /// relation entre activite et plan_activite
    public function activite(){
    	return $this->belongsTo(Activite::class, 'activite_id','id');
    }
     /// relation entre plan_activite et children

    public function children(){
    	return $this->hasMany(PlanActivite::class, 'parent');
    }
}
