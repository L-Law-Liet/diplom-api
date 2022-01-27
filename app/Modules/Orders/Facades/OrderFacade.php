<?php

namespace App\Modules\Orders\Facades;

use App\Facades\ModuleFacade;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OrderFacade extends ModuleFacade
{

    protected function model(): string
    {
        return Order::class;
    }
}
