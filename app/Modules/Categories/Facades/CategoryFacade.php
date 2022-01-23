<?php

namespace App\Modules\Categories\Facades;

use App\Facades\ModuleFacade;
use App\Models\Category;

class CategoryFacade extends ModuleFacade
{

    protected function model(): string
    {
        return Category::class;
    }
}
