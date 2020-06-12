<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Settings extends Model
{
    //

    public function getAllConfig()
    {
        return DB::table('list_config')->get();
    }
    public function getConfig($str_key)
    {
        return DB::table('list_config')->where('key', $str_key)->first();
    }
    public function saveConfig($str_key, $mix_value)
    {
        return DB::table('list_config')->where('key', $str_key)->update(['value' => $mix_value]);
    }
}
