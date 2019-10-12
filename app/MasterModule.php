<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MasterModule extends Model
{
    //
    public $timestamps = false;
    protected $table = 'master_modules';
    protected $primaryKey = 'id';

    public static function setAccessRole($int_id, $int_module_id)
    {
        return DB::table('cref_role_module')
                ->insert([
                    'role_id' => $int_id,
                    'module_id' => $int_module_id
                ]);
    }
}
