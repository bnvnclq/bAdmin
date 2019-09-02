<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

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
     * Function that can change value of any given column using user id
     *
     * @param int $int_id = User ID to change
     * @param int $str_key = Name of column
     * @param mixed $mix_value = Desired value to replace
     */
    private function changeValue($int_id, $str_key, $mix_value)
    {
        return DB::table('users')
                    ->where('id', $int_id)
                    ->update([$str_key => $mix_value]);
    }

    /************************************************************
     * Non static functions 
     ************************************************************/

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
     * Function that returns the list of modules avaiable for a certain user
     *
     * @param string $str_search = Search query for matching username, first name, and last name
     * @param int $int_role_id = Specific Role ID to search
     * @param int $int_page_count = Change the default page count
     * @param int $int_is_enabled = Search on enabled or disabled users
     */
    public function getAll($str_search, $int_role_id, $int_page_count, $int_is_enabled)
    {
        $db_query = DB::table('users AS u')->selectRaw('u.*, mr.name AS role_name');
        if(isset($str_search))
        {
            $db_query->where(function ($query) use ($str_search){
                $query->where('u.username', 'LIKE', "$str_search%")
                        ->orWhere('u.first_name', 'LIKE', "$str_search%")
                        ->orWhere('u.last_name', 'LIKE', "$str_search%");
            });
        }
        if(isset($int_role_id))
        {
            $db_query->where('u.role_ID', $int_role_id);
        }
        if(isset($int_is_enabled))
        {
            $db_query->where('u.is_enabled', $int_is_enabled);
        }
        $db_query->leftJoin('master_roles AS mr', 'mr.ID', 'u.role_ID');
        return $db_query->paginate($int_page_count);
        
    }
    
    /**
     * Function that enable user
     *
     * @param int $int_user_id = User ID to be check
     */
    public function enable($int_user_id)
    {
        Self::changeValue($int_user_id, 'is_enabled', 1);
    }

    /**
     * Function that disable user
     *
     * @param int $int_user_id = User ID to be check
     */
    public function disable($int_user_id)
    {
        Self::changeValue($int_user_id, 'is_enabled', 0);
    }

    /************************************************************
     * Static functions 
     ************************************************************/

    /**
     * Function that check whether the certain role has permission to specific module
     *
     * @param string $str_module = Module code to check with the role ID
     * @param int $int_role_ID = Role ID to check
     */
    public static function hasPermission($str_module, $int_role_id)
    {
        $int_count = DB::table('cref_role_module AS crm')
                        ->join('master_modules AS mm', 'mm.ID', 'crm.module_ID')
                        ->where('crm.role_id', $int_role_id)
                        ->where('mm.code', $str_module)
                        ->count();
        
        return ($int_count > 0) ? true : false;
    }

    /**
     * Function that checks whether the username does exists
     *
     * @param string $str_username = username to check to
     * @return bool
     */
    public static function isUnique($str_username)
    {
        $int_count = DB::table('users')->where('username', $str_username)->count();
        return ($int_count > 0) ? false : true;
    }
}
