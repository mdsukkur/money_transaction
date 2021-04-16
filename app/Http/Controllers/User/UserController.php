<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{
    public function profileUpdate(UserRequest $userRequest)
    {
        auth()->user()->update($userRequest->validated());

        return redirect()->back()->with('success', trans('lang.profile_update_message'));
    }
}
