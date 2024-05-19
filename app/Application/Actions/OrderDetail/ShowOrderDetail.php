<?php

declare(strict_types=1);

namespace App\Application\Actions\OrderDetail;

use Illuminate\Http\Request;
use App\Application\Service\OrderDetailService;

class ShowOrderDetail
{
    private $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }

    public function showOrderDetailById(int $id)
    {
        $orderDetail = $this->orderDetailService->findOrderDetailById($id);
        return response()->json($orderDetail);
    }
}
