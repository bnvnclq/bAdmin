<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MasterRole extends Model
{
    //
    protected $primaryKey = "id";
    protected $table = "master_roles";
    public $timestamps = false;

    public function getModuleAccess($int_id)
    {
        return DB::table('cref_role_module AS crm')
                ->leftJoin('master_modules AS mm', 'crm.module_id', 'mm.id')
                ->where('crm.role_id', $int_id)
                ->get();
    }

    public static function deleteModuleAccessByRoleID($int_id)
    {
        return DB::table('cref_role_module')
                ->where('role_id', $int_id)
                ->delete();
    }

    
}
