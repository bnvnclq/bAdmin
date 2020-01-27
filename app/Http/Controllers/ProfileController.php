<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\User;

class ProfileController extends Controller
{
    //
    /**
     * 
     */
    public function viewChangePassword(Request $request)
    {
        return view('profile.change_password');
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'          =>  'required',
            'password'              =>  'required|confirmed|min:6',
            'password_confirmation' =>  'required|min:6'
        ],[
            'password.required'                 =>  'The new password is required',
            'password_confirmation.required'    =>  'The new password is required'
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password))
        {
            return redirect()->back()->with('error', 'Incorrect old password');
        }
        else
        {
            $current_user = User::find(Auth::user()->id);
            $current_user->password = Hash::make($request->password);
            $current_user->save();
            return redirect()->back()->with('success', 'Password changed successfully.');
        }
    }
}
