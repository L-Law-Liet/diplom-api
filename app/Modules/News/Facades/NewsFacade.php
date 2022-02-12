<?php

namespace App\Modules\News\Facades;

use App\Facades\ModuleFacade;
use App\Models\News;
use App\Models\Product;
use App\Modules\Media\Traits\WithMedia;
use App\Services\MediaService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class NewsFacade extends ModuleFacade
{
    use WithMedia;

    protected function model(): string
    {
        return News::class;
    }
}
