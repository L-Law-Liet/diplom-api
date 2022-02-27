<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Modules\Products\Facades\ProductFacade;
use App\Modules\Products\Requests\ProductRequest;
use App\Services\MediaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    private ProductFacade $facade;

    /**
     * @param ProductFacade $facade
     */
    public function __construct(ProductFacade $facade)
    {
        $this->facade = $facade;
    }


    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->facade->with(['category'])->get());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $product = $this->facade->findOrFail($id)->load(['category']);
        return response()->json($product, Response::HTTP_OK);
    }

    /**
     * @param ProductRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ProductRequest $request, $id): JsonResponse
    {
        $product = $this->facade->findOrFail($id);
        $product->update($request->validated());
        return response()->json($product, Response::HTTP_ACCEPTED);
    }

    /**
     * @param $id
     * @return Response
     */
    public function destroy($id): Response
    {
        $status = $this->facade->destroy($id) ? 200 : 404;
        return response()->noContent($status);
    }
}
