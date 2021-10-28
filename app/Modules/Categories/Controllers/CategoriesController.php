<?php

namespace App\Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Modules\Category\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Category::all());
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(Category::findOrFail($id), Response::HTTP_OK);
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return response()->json($category, Response::HTTP_ACCEPTED);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Category::destroy($id) ? 200 : 404;
        return response()->noContent($status);
    }

}
