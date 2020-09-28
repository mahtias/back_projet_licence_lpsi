<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $table = 'roles';

    public $timestamps = false;

    protected $guarded = ['id'];


    // relation entre role et userRole

    public function userRole(){
    	return $this->hasOne(UserRole::class, 'role_id');
    }
}
