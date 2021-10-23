<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Profile extends Model
{
    const FILE_DESTINATION = 'upload/images';
    
    protected $fillable = [
        'bin', 'address', 'phone_number', 'website', 'description', 'company_logo'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function uploadFile($attribute, $file)
    {
        $destinationPath = public_path(self::FILE_DESTINATION);

        $oldFile = public_path('upload/' . $this->$attribute);

        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $newFile = 'images/' . $fileName;

        $file->move($destinationPath, $fileName);

        $this->$attribute = $newFile;

        return $this->$attribute;
    }
}
