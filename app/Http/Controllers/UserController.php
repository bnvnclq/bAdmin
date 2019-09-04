<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Rules\uniqueUsername;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = new User();
        $col_user_roles = \App\MasterRole::get();
        $col_users = $user->getAll(
            $request->search ?? null,
            $request->role_id ?? null,
            $request->page_count ?? 10,
            $request->is_enable ?? null
        );
        
        return view('user.index')
                ->with([
                    'users' => $col_users,
                    'user_roles' => $col_user_roles,
                ]);
    }

    public function addView()
    {
        $col_user_roles = \App\MasterRole::get();

        return view('user.add')
                ->with([
                    'user_roles' => $col_user_roles,
                ]);
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'email'         => 'required|email',
            'username'      => ['required', new uniqueUsername],
            'first_name'    => 'required|max:63',
            'last_name'     => 'required|max:63',
            'role'          => 'required|min:1|numeric',
            'password'      => 'required|confirmed|min:6',
        ],[
            'email.required'        => 'Email address is required.',
            'username.required'     => 'Username is required.',
            'first_name.required'   => 'First name is required.',
            'last_name.required'    => 'Last name is required.',
            'role.numeric'        => 'Invalid role selection.'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->created_at = date('Y-m-d H:i:s');
        $user->is_enabled = 1;
        $user->save();

        return redirect()->route('users')->with('success', 'User ' . $request->username . ' has successfully added');
    }


    public function editView(Request $request)
    {
        $col_user_roles = \App\MasterRole::get();

        try
        {
            $col_user = User::findOrFail($request->id);
            return view('user.edit')
            ->with([
                'user_roles' => $col_user_roles,
                'user' => $col_user,
            ]);
        }catch(\Exception $exc)
        {
            return redirect()->route('users')->with('error', 'Invalid user id');
        }
        
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'email'         => 'required|email',
            'first_name'    => 'required|max:63',
            'last_name'     => 'required|max:63',
            'role'          => 'required|min:1|numeric',
            'password'      => 'confirmed',
        ],[
            'email.required'        => 'Email address is required.',
            'first_name.required'   => 'First name is required.',
            'last_name.required'    => 'Last name is required.',
            'role.numeric'        => 'Invalid role selection.'
        ]);

        $user = User::find($request->id);
        if($request->password != null)
        {
            $user->password = Hash::make($request->password);
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->save();

        return redirect()->route('users')->with('message', 'User ' . $request->username . ' has successfully updated');
    }

    public function enable(Request $request)
    {
        $user = new User();
        $user->enable($request->id);
        return redirect()->back()->with('message', 'Enabled user id: ' . $request->id);
    }
    public function disable(Request $request)
    {
        $user = new User();
        $user->disable($request->id);
        return redirect()->back()->with('message', 'Disabled user id: ' . $request->id);
    }

    public function managePermissionView(Request $request)
    {
        $col_modules = \App\MasterModule::get();
        try
        {
            $col_user = User::findOrFail($request->id);
            return view('user.permission')
            ->with([
                'user' => $col_user,
                'modules' => $col_modules,
            ]);
        }catch(\Exception $exc)
        {
            return redirect()->route('users')->with('error', 'Invalid user id ');
        }
    }

    public function managePermission(Request $request)
    {

    }

}
