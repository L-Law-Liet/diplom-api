<?php

namespace App\Modules\Users\Facades;

use App\Facades\ModuleFacade;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use App\Services\MediaService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class UserFacade extends ModuleFacade
{

    protected function model(): string
    {
        return User::class;
    }

    /**
     * @param UploadedFile $file
     * @param User $user
     * @return Media
     */
    public function saveMedia(UploadedFile $file, User $user): Media
    {
        $user->media()->delete();
        return MediaService::save($file, $this->model->getDirectory(), $user->id, $this->model());
    }
}
