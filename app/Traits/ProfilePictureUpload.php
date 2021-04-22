<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

trait ProfilePictureUpload
{
    public function profilePictureUpload($file)
    {
        $userID = auth()->id();
        $fileName = time() . ".webp";

        $small = "storage/user/$userID/40";
        $medium = "storage/user/$userID/100";
        $orginal = "storage/user/$userID/orginal";

        if (file_exists("storage/app/public/user/$userID")) File::deleteDirectories("storage/app/public/user/$userID");
        if (!file_exists($orginal)) mkdir($orginal, 666, true);
        if (!file_exists($medium)) mkdir($medium, 666, true);
        if (!file_exists($small)) mkdir($small, 666, true);

        Image::make($file)->resize(100, 100)->encode('webp')->save("$medium/$fileName");
        Image::make($file)->resize(40, 40)->encode('webp')->save("$small/$fileName");
        Image::make($file)->encode('webp', 75)->save("$orginal/$fileName");

        return $fileName;
    }
}
