<?php

namespace App\Modules\Info\Controllers;

use App\Models\Info;
use App\Modules\Info\Resources\InfoResource;
use Illuminate\Http\JsonResponse;

class InfoController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(InfoResource::collection(Info::all()));
    }

    /**
     * @param string $key
     * @return JsonResponse
     */
    public function getByKey(string $key): JsonResponse
    {
        $info = Info::where('key', $key)->first();
        return response()->json(new InfoResource($info));
    }
}
