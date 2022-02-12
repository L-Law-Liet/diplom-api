<?php

namespace App\Modules\News\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\News\Facades\NewsFacade;
use App\Modules\Products\Requests\NewsRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    private NewsFacade $facade;

    /**
     * @param NewsFacade $facade
     */
    public function __construct(NewsFacade $facade)
    {
        $this->facade = $facade;
    }


    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->facade->with(['media'])->get());
    }

    /**
     * @param NewsRequest $request
     * @return JsonResponse
     */
    public function store(NewsRequest $request): JsonResponse
    {
        $file = $request->file('image');
        $news = $this->facade->create($request->except(['image']));
        if ($file) {
            $this->facade->saveMedia($file, $news);
        }
        return response()->json($news, Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $news = $this->facade->findOrFail($id)->load(['media']);
        return response()->json($news, Response::HTTP_OK);
    }

    /**
     * @param NewsRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(NewsRequest $request, $id): JsonResponse
    {
        $news = $this->facade->findOrFail($id);
        $news->update($request->validated());
        return response()->json($news, Response::HTTP_ACCEPTED);
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
