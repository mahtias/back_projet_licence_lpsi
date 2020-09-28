<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class budget extends Model
{
    protected $table = 'budgets';

    public $timestamps = false;

    protected $guarded = ['id'];
}
