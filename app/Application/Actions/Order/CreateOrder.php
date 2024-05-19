<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use App\Domain\ValueObjects\OrderValueObject;
use App\Application\Service\OrderService;
use App\Application\Requests\OrderRequest;

class CreateOrder
{
    public function handle(OrderRequest $request, OrderService $builder)
    {
        // Lấy dữ liệu từ request
        $data = $request->validated();

        // Gọi phương thức trong service để tạo đơn hàng
        $orderValueObject = new OrderValueObject($data);

        
        // Trả về kết quả
        $order = $builder->createOrder($orderValueObject);

        return $order;
    }
}
