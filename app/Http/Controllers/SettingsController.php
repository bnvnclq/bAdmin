<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterModule;
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
        $settings = new Settings();
        return view('settings.module.index')
                ->with([
                    'arr_modules' => MasterModule::all(),
                ]);
    }

    public function saveModule(Request $request)
    {
    }
}
