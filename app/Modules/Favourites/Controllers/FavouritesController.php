<?php

namespace App\Modules\Favourites\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Modules\Favourites\Facades\FavouriteFacade;
use App\Modules\Favourites\Requests\FavouritesRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouritesController extends Controller
{
    private FavouriteFacade $facade;

    /**
     * @param FavouriteFacade $facade
     */
    public function __construct(FavouriteFacade $facade)
    {
        $this->facade = $facade;
    }


    /**
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($request->user()->favourite_products()->with(['image', 'category'])->get());
    }

    /**
     * @param FavouritesRequest $request
     * @return JsonResponse
     */
    public function store(FavouritesRequest $request): JsonResponse
    {
        return $this->facade->addToFavourite($request->user(), $request->validated());
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function show(Request $request, $id): JsonResponse
    {
        $favourite = $request->user()
            ->favourites()
            ->where('product_id', $id)
            ->exists();
        return response()->json(['exists' => $favourite], Response::HTTP_OK);
    }

    /**
     * @param FavouritesRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(FavouritesRequest $request, $id): JsonResponse
    {
        $category = $this->facade->findOrFail($id);
        $category->update($request->validated());
        return response()->json($category, Response::HTTP_ACCEPTED);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Request $request, $id): JsonResponse
    {
        $status = $request->user()
            ->favourites()
            ->where('product_id', $id)
            ->delete();
        return response()->json(['deleted' => $status]);
    }
}
