<?php

namespace App\Modules\Articles\Controllers;

use App\Models\Article;
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
     * @param string $type
     * @return JsonResponse
     */
    public function getByType(string $type): JsonResponse
    {
        $articles = Article::where('type', $type)->get();
        return response()->json(ArticleResource::collection($articles));
    }
}
