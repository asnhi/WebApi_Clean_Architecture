<?php
declare(strict_types=1);

namespace App\Domain\ValueObjects;

class OrderValueObject
{
    public $user_id;
    public $total;
    public $order_status;
    public $pay_type;
    public $order_id_ref;

    public function __construct(array $data)
    {
        // Gán các giá trị từ dữ liệu vào các thuộc tính
        $this->user_id = $data['user_id'];
        $this->total = $data['total'];
        $this->order_status = $data['order_status'];
        $this->pay_type = $data['pay_type'];
        $this->order_id_ref = $data['order_id_ref'];
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'total' => $this->total,
            'order_status' => $this->order_status,
            'pay_type' => $this->pay_type,
            'order_id_ref' => $this->order_id_ref,
        ];
    }
}
