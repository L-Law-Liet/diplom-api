<?php

namespace App\Modules\Products\Facades;

use App\Facades\ModuleFacade;
use App\Models\Product;
use App\Services\MediaService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class ProductFacade extends ModuleFacade
{
    protected function model(): string
    {
        return Product::class;
    }

    /**
     * @param UploadedFile $file
     * @param int $id
     * @return void
     */
    public function saveMedia(UploadedFile $file, int $id)
    {
        MediaService::save($file, $this->model->getDirectory(), $id, $this->model());
    }
}
