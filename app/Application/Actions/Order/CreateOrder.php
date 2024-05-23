<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Illuminate\Support\Facades\Validator;
use App\Domain\ValueObjects\OrderValueObject;
use App\Application\Service\OrderService;
use App\Application\Requests\OrderRequest;

class CreateOrder
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function execute(OrderRequest $request)
    {
        // Lấy dữ liệu từ request
        $data = $request->validated();

        // Gọi phương thức trong service để tạo đơn hàng
        $orderValueObject = new OrderValueObject($data);
        $order = $this->orderService->createOrder($orderValueObject);

        return $order;
    }
}
