<?php

namespace App\Modules\API\Controllers;

use App\Modules\API\Services\CurrencyService;
use App\Modules\API\Services\ParsingService;
use Illuminate\Http\JsonResponse;

class ExternalAPIController
{
    /**
     * @param ParsingService $service
     * @return JsonResponse
     */
    public function getOilPrice(ParsingService $service): JsonResponse
    {
        return response()->json($service->getOilPrice());
    }
    public function getFree(CurrencyService $service)
    {
        return $service->getCurrencies();
    }
    public function getCurrencies(CurrencyService $service)
    {
        return $service->getCurrencies();
    }
}
