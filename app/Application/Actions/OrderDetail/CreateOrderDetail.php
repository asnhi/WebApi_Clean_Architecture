<?php

declare(strict_types=1);

namespace App\Application\Actions\OrderDetail;

use Illuminate\Support\Facades\Validator;
use App\Domain\ValueObjects\OrderDetailValueObject;
use App\Application\Service\OrderDetailService;
use App\Application\Requests\OrderDetailRequest;

class CreateOrderDetail
{
    protected $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }

    public function execute(OrderDetailRequest $request)
    {
        // Lấy dữ liệu từ request
        $data = $request->validated();

        // Gọi phương thức trong service để tạo chi tiết đơn hàng
        $orderDetailValueObject = new OrderDetailValueObject($data);
        $orderDetail = $this->orderDetailService->createOrderDetail($orderDetailValueObject);

        return $orderDetail;
    }
}
