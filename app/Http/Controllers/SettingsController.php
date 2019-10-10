<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterModule;
use App\MasterRole;
use App\Settings;

class SettingsController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('settings.index');
    }

    public function indexDefaultValue(Request $request)
    {
        $settings = new Settings();
        return view('settings.default-value.index')
                ->with([
                    'arr_configs' => $settings->getAllConfig(),
                ]);
    }

    public function saveDefaultValue(Request $request)
    {
        $settings = new Settings();
        // dd($request->key['refresh_time_permission']);
        foreach($request->key as $key => $mix_value)
        {
            $settings->saveConfig($key, $mix_value);
        }
        return redirect()->back()->with('success', 'Default values has been saved.');
    }

    public function indexModule(Request $request)
    {
        return view('settings.module.index')
                ->with([
                    'arr_modules' => MasterModule::all(),
                ]);
    }

    public function saveModule(Request $request)
    {
        foreach($request->key as $int_id => $str_module_class)
        {
            $module = MasterModule::find($int_id);
            $module->icon_class = $str_module_class;
            $module->update();
        }
        return redirect()->back()->with('success', 'Successfully saved.');
    }

    public function indexUserTypes(Request $request)
    {
        return view('settings.user-types.index')
                ->with([
                    'arr_user_types' => MasterRole::all(),
                ]);
    }

    public function editUserTypes(Request $request)
    {
        $role = MasterRole::find($request->id);
        $role_access = $role->getModuleAccess($request->id);
        return view('settings.user-types.edit')
                ->with([
                    'arr_user_type' => $role,
                    'arr_modules' => MasterModule::all(),
                    'arr_modules_access' => $role_access
                ]);
    }

    public function updateUserTypes(Request $request)
    {
        
    }

}
