<?php

namespace App\Modules\Orders\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Orders\Facades\CartFacade;
use App\Modules\Orders\Requests\CartsRequest;
use App\Modules\Orders\Resources\CartResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartsController extends Controller
{
    private CartFacade $facade;

    /**
     * @param CartFacade $facade
     */
    public function __construct(CartFacade $facade)
    {
        $this->facade = $facade;
    }


    /**
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $products = CartResource::collection($request->user()
            ->carts()
            ->with(['product', 'product.category'])
            ->get());
        $data = [
            'carts' => $products,
            'discount' => $request->user()->discount_status->discount
        ];
        return response()->json($data);
    }

    /**
     * @param CartsRequest $request
     * @return JsonResponse
     */
    public function store(CartsRequest $request): JsonResponse
    {
        return $this->facade->addToCart($request->user(), $request->validated());
    }

    /**
     * @param CartsRequest $request
     * @return JsonResponse
     */
    public function update(CartsRequest $request, int $id): JsonResponse
    {

        return response()->json($this->facade->findOrFail($id)->update($request->validated()));
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function show(Request $request, $id): JsonResponse
    {
        $cart = $request->user()
            ->carts()
            ->where('product_id', $id)
            ->exists();
        return response()->json(['exists' => $cart], Response::HTTP_OK);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $status = $this->facade->destroy($id);
        return response()->json(['deleted' => $status]);
    }
}
