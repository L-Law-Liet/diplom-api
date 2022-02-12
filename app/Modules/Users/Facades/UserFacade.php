<?php

namespace App\Modules\Users\Facades;

use App\Facades\ModuleFacade;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use App\Modules\Media\Traits\WithMedia;
use App\Services\MediaService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class UserFacade extends ModuleFacade
{
    use WithMedia;

    protected function model(): string
    {
        return User::class;
    }
}
