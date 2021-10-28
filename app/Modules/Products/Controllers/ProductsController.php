<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Modules\Products\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Product::with('category')->get());
    }

    /**
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return response()->json($product, Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(Product::findOrFail($id), Response::HTTP_OK);
    }

    /**
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return response()->json($product, Response::HTTP_ACCEPTED);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Product::destroy($id) ? 200 : 404;
        return response()->noContent($status);
    }

    public function getByCategory(Category $category)
    {
        return response($category->products);
    }
}
