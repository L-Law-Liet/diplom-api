<?php

namespace App\Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Modules\Categories\Facades\CategoryFacade;
use App\Modules\Categories\Requests\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    private CategoryFacade $facade;

    /**
     * @param CategoryFacade $facade
     */
    public function __construct(CategoryFacade $facade)
    {
        $this->facade = $facade;
    }


    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->facade->all());
    }

    /**
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->facade->create($request->validated());
        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $category = $this->facade->findOrFail($id)->load('products', 'products.image');
        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, $id): JsonResponse
    {
        $category = $this->facade->findOrFail($id);
        $category->update($request->validated());
        return response()->json($category, Response::HTTP_ACCEPTED);
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
