<?php

namespace App;

use Illuminate\Http\UploadedFile as File;
use Storage;

class Avatar
{
    static public function getPDefaultName() {
        return 'default_user_avatar.jpg';
    }
//storage_path('app/'.static::getPathToSave().
    static private function getDir() {
        return "storage/image/user_avatar";
    }

//    static public function getFileName(File $file) {
//        return data('d.m.Y').$file->getClientOriginalName();
//    }

    static public function save(File &$image)
    {

        $path = $image->store('avatar');
        $name = $image->getClientOriginalName();
        return $name;

//        $path = Storage::disk('avatar')->putFile('file.txt', $image);
//        $request->file('photo')->isValid();
//        $request->file('photo')->move($destinationPath);
//        $request->file('photo')->move($destinationPath, $fileName);

    }

    static public function delete($filename) {
        if (is_null($filename)) return;

        Storage::disk('avatar')->delete($filename);

    }

    static public function update(File &$old_avatar, File &$new_avatar) {
        self::delete($old_avatar->getClientOriginalName());
        return self::save($new_avatar);
    }

    static public function getPath($name) {
        if (is_null($name)) {
            $name = static::getPDefaultName();
        }
        return static::getDir().'/'.$name;
    }

}
