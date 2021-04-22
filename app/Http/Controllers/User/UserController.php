<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Traits\ProfilePictureUpload;

class UserController extends Controller
{
    use ProfilePictureUpload;

    public function profilePage()
    {
        return view('frontend.pages.profile.index');
    }

    public function editProfilePage()
    {
        return view('frontend.pages.profile.edit_profile');
    }

    public function profileUpdate(UserRequest $userRequest)
    {
        $all = $userRequest->validated();

        if ($userRequest->hasFile('picture')) $all['picture'] = $this->profilePictureUpload($userRequest->picture);

        auth()->user()->update($all);

        return redirect()->route('user.profile')->with('success', trans('lang.profile_update_message'));
    }
}
