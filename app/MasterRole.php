<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterRole extends Model
{
    //
    protected $primaryKey = "id";
    protected $table = "master_roles";
    public $timestamps = false;
}
