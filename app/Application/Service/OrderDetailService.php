<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Entities\OrderDetail;
use App\Domain\ValueObjects\OrderDetailValueObject;

class OrderDetailService
{
    public function createOrderDetail(OrderDetailValueObject $data)
    {
        $orderDetail = OrderDetail::create($data->toArray());
        $orderDetail->save();
        return $orderDetail;
    }

    public function findOrderDetailById($id)
    {
        return OrderDetail::findOrFail($id);
    }
}
