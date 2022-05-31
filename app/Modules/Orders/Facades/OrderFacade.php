<?php

namespace App\Modules\Orders\Facades;

use App\Facades\ModuleFacade;
use App\Models\Cart;
use App\Models\DiscountStatus;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Modules\API\Services\ParsingService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OrderFacade extends ModuleFacade
{
    private ParsingService $parsingService;

    public function __construct()
    {
        $this->parsingService = new ParsingService();
        parent::__construct();
    }

    protected function model(): string
    {
        return Order::class;
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function makeOrder(User $user): JsonResponse
    {
        DB::beginTransaction();
        try {
            $carts = $user->carts()->with(['product'])->get();
            $total = 0;
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $total,
                'discount' => $user->discount_status->discount
            ]);
            foreach ($carts as $cart) {
                $total += round($this->parsingService->getOilPrice()['Brent'] * $cart->product->price, 2) * $cart->count * discount($order->discount);
                $this->createOrderItem($cart, $order->id);
            }
            $order->total = $total;
            $user->carts()->delete();
            $order->save();
            $this->updateCard($user);
            DB::commit();
            return response()->json(['ordered' => true]);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json(['ordered' => false]);
        }
    }

    public function createOrderItem(Cart $cart, int $id)
    {
        OrderItem::create([
            'name' => $cart->product->name,
            'cost' => $cart->product->price,
            'count' => $cart->count,
            'order_id' => $id,
            'product_id' => $cart->product_id,
        ]);
    }

    public function updateCard(User $user)
    {
        $card = $user->discount_card;
        $card->discount_status_id = DiscountStatus::where('min', '<=', $user->orders()->sum('total'))->orderByDesc('min')->first()->id;
        $card->expires = now()->addYear();
        $card->save();
    }
}
