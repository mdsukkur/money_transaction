<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('userProfilePicture')) {
    function userProfilePicture($userID, $image = null, $size = 100)
    {
        if (!is_null($image) && Storage::exists("/public/user/$userID/$size/$image")) {
            return asset("storage/user/$userID/$size/$image");
        } else {
            if ($size == 40) return asset('frontend_assets/images/profile-thumb-sm.jpg');
            else return asset('frontend_assets/images/profile-thumb.jpg');
        }
    }
}
