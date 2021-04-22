<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('frontend.pages.change_password.index');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => 'required|string|confirmed|min:6|different:current_password'
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->password),
            'last_password_changed' => date('Y-m-d')
        ]);

        auth()->logout();

        return redirect()->route('login')->with('status', trans('lang.password_update_message'));
    }
}
