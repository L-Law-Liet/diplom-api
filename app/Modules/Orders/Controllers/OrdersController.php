<?php

namespace App\Modules\Orders\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Modules\Orders\Facades\OrderFacade;
use App\Modules\Orders\Requests\CartsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    private OrderFacade $facade;

    /**
     * @param OrderFacade $facade
     */
    public function __construct(OrderFacade $facade)
    {
        $this->facade = $facade;
    }


    /**
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $products = $request->user()
            ->orders()
            ->with(['order_items'])
            ->get();
        return response()->json($products);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $user = $request->user();
        DB::beginTransaction();
        try {
            $carts = $user->carts()->with(['product'])->get();
            $total = 0;
            $order = Order::create(['user_id' => $user->id, 'total' => $total]);
            foreach ($carts as $cart) {
                $total += $cart->product->price * $cart->count;
                OrderItem::create([
                    'name' => $cart->product->name,
                    'cost' => $cart->product->price,
                    'count' => $cart->count,
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                ]);
            }
            $order->total = $total;
            $user->carts()->delete();
            $order->save();
            DB::commit();
            return response()->json(['ordered' => true]);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json(['ordered' => false]);
        }
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
