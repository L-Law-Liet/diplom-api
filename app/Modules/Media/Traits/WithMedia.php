<?php

namespace App\Modules\Media\Traits;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait WithMedia
{
    /**
     * @param UploadedFile $file
     * @param Model $model
     * @return string
     */
    public function saveMedia(UploadedFile $file, Model $model): string
    {
        $id = $model->id;
        $type = get_class($model);
        $dir = $this->getDirectory($type);

        $extension = $file->getClientOriginalExtension();
        $name = time() . '.' . $extension;
        $path = Storage::disk('public')->putFileAs($dir, $file, $name);
        $model->image = $path;
        $model->save();
        return getLink($path);
    }

    /**
     * @param string $type
     * @return string
     */
    private function getDirectory(string $type): string
    {
        $name = $this->getClassName($type);
        return \Str::plural(strtolower($name));
    }

    /**
     * @param string $type
     * @return string
     */
    private function getClassName(string $type): string
    {
        $path = explode('\\', $type);
        return array_pop($path);
    }
}
