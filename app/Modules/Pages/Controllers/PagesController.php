<?php

namespace App\Modules\Pages\Controllers;

use App\Modules\Pages\Services\PagesService;

class PagesController
{
    public function getOilPrice(PagesService $pagesService)
    {
        return response()->json($pagesService->parseOilPrice());
    }
}
