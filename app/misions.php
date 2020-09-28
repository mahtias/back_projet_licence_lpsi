<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class misions extends Model
{
      protected $table = 'misions';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function categorieMission(){
    	return $this->belongsTo(CategorieMission::class,'categorie_mission_id','id');
    }

    // relation entre mission et type de mission

    public function typeMission(){
    	return $this->belongsTo(TypeMission::class, 'type_mission_id', 'id');
    }
    //
    public function personnel(){
    	return $this->belongsTo(Personnel::class, 'personnel_id','id');
    }

    public function moyenTransport(){
    	return $this->belongsTo(MoyenTransport::class, 'moyen_transport_id','id');
    }

    public function modePaiement(){
    	return $this->belongsTo(ModePaiement::class,'mode_paiement_id','id');
    }

    public function anneeMission(){
    	return $this->belongsTo(AnneeMission::class, 'annee_mission_id','id');
    }

}

