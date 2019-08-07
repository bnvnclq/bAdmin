<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'last_name', 'first_name', 'email', 'password', 'role_id,'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];
    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

    /**
     * Function that returns the list of modules avaiable for a certain user
     *
     * @param int $int_id = Role ID to reference all available modules
     */
    public function getAllPermission($int_role_id)
    {
        return DB::table('cref_role_module AS crm')
                        ->selectRaw('mm.*')
                        ->join('master_modules AS mm', 'mm.id', 'crm.module_id')
                        ->where('crm.role_id', $int_role_id)
                        ->get();
    }

    /**
     * Static functions
     */
    public static function hasPermission($str_module, $int_role_id)
    {
        $int_count = DB::table('cref_role_module AS crm')
                        ->join('master_modules AS mm', 'mm.id', 'crm.module_id')
                        ->where('crm.role_id', $int_role_id)
                        ->where('mm.code', $str_module)
                        ->count();
        
        return ($int_count > 0) ? true : false;
    }
}
