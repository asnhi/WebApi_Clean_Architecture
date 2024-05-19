<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Illuminate\Http\Request;
use App\Application\Service\OrderService;

class ShowOrder
{
    private $builder;

    public function __construct(OrderService $builder)
    {
        $this->builder = $builder;
    }

    public function showOrderByUserId()
    {
        $userId = auth()->id(); // Lấy user_id từ authenticated user
        $orders = $this->builder->findOrdersByUserId($userId);
        return response()->json($orders);
    }
    
    
}
