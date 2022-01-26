<?php

namespace App\Modules\Favourites\Facades;

use App\Facades\ModuleFacade;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FavouriteFacade extends ModuleFacade
{

    protected function model(): string
    {
        return Favourite::class;
    }

    /**
     * @param User $user
     * @param array $validated
     * @return JsonResponse
     */
    public function addToFavourite(User $user, array $validated): JsonResponse
    {

        $favourite = $this->model->updateOrCreate([
            'product_id' => $validated['product_id'],
            'user_id' => $user->id,
        ]);
        return response()->json(['created' => boolval($favourite)], Response::HTTP_CREATED);
    }
}
