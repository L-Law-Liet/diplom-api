<?php

namespace App\Modules\Articles\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\Info;
use App\Modules\Articles\Resources\ArticleResource;
use App\Modules\Info\Resources\InfoResource;
use Illuminate\Http\JsonResponse;

class ArticlesController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(ArticleResource::collection(Article::all()));
    }

    /**
     * @return JsonResponse
     */
    public function getTypes(): JsonResponse
    {
        return response()->json(ArticleType::all());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getByType(int $id): JsonResponse
    {
        $articles = ArticleType::findOrFail($id)->articles;
        return response()->json(ArticleResource::collection($articles));
    }
}
