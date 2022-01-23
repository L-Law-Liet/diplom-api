<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;

class MediaService
{
    /**
     * @param UploadedFile $file
     * @param string $dir
     * @param int $id
     * @param string $type
     * @return void
     */
    public static function save(UploadedFile $file, string $dir, int $id, string $type): void
    {
        $extension = $file->getClientOriginalExtension();
        $name = time() . '.' . $extension;
        $path = asset('storage/') . $dir;
        $link = $path . $name;
        $file->move($path, $name);
        Media::create([
            'name' => $name,
            'link' => $link,
            'extension' => $extension,
            'media_id' => $id,
            'media_type' => $type,
        ]);
    }
}
