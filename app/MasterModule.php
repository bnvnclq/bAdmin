<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterModule extends Model
{
    //
    public $timestamps = false;
    protected $table = 'master_modules';
    protected $primaryKey = 'id';
}
