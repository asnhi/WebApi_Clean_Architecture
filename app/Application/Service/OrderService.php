<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Entities\Order;
use App\Domain\ValueObjects\OrderValueObject;

class OrderService
{
    public function createOrder(OrderValueObject $data)
    {
        $order = Order::create($data->toArray());
        $order->save();
        return $order;
    }
    public function findOrdersByUserId(int $userId)
    {
        return Order::where('user_id', $userId)->get();
    }

    
    
}
