<?php

namespace App\Modules\Orders\Facades;

use App\Facades\ModuleFacade;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CartFacade extends ModuleFacade
{

    protected function model(): string
    {
        return Cart::class;
    }

    /**
     * @param User $user
     * @param array $validated
     * @return JsonResponse
     */
    public function addToCart(User $user, array $validated): JsonResponse
    {

        $cart = $this->model->firstOrNew([
            'product_id' => $validated['product_id'],
            'user_id' => $user->id,
        ]);
        $cart->count += $validated['count'];
        $cart->save();
        return response()->json(['created' => boolval($cart)], Response::HTTP_CREATED);
    }
}
