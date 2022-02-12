<?php

namespace App\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Modules\Users\Facades\UserFacade;
use App\Modules\Users\Requests\UserAvatarRequest;
use App\Modules\Users\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    private UserFacade $facade;

    /**
     * @param UserFacade $facade
     */
    public function __construct(UserFacade $facade)
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
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $request->user()->update($request->validated());
        return response()->json($request->user()->load(['media']), Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = $this->facade->findOrFail($id);
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id): JsonResponse
    {
        $user = $this->facade->findOrFail($id);
        $user->update($request->validated());
        return response()->json($user, Response::HTTP_ACCEPTED);
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

    /**
     * @param Request $request
     * @return mixed
     */
    public function getUser(Request $request)
    {
        return $request->user()->load(['media']);
    }

    /**
     * @param UserAvatarRequest $request
     * @return JsonResponse
     */
    public function setAvatar(UserAvatarRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->media()->delete();
        $media = $this->facade->saveMedia($request->image, $user);
        return \response()->json($media);
    }
}
