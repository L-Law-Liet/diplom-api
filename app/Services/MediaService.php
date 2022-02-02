<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    /**
     * @param UploadedFile $file
     * @param string $dir
     * @param int $id
     * @param string $type
     * @return Media
     */
    public static function save(UploadedFile $file, string $dir, int $id, string $type): Media
    {
        $extension = $file->getClientOriginalExtension();
        $name = time() . '.' . $extension;
        $path = Storage::disk('public')->putFileAs($dir, $file, $name);
        $link = asset('storage') . '/' . $path;
        return Media::create([
            'name' => $name,
            'link' => $link,
            'extension' => $extension,
            'media_id' => $id,
            'media_type' => $type,
        ]);
    }
}
