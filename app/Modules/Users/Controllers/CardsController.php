<?php

namespace App\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DiscountStatus;
use App\Modules\Users\Facades\UserFacade;
use App\Modules\Users\Requests\UserAvatarRequest;
use App\Modules\Users\Requests\UserRequest;
use App\Modules\Users\Resources\DiscountStatusResource;
use App\Modules\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CardsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(DiscountStatusResource::collection(DiscountStatus::all()));
    }
}
