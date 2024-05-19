<?php
declare(strict_types=1);

namespace App\Domain\ValueObjects;

class OrderDetailValueObject
{
    public $order_id;
    public $game_id;
    public $quantity;
    public $price;

    public function __construct(array $data)
    {
        // Gán các giá trị từ dữ liệu vào các thuộc tính
        $this->order_id = $data['order_id'];
        $this->game_id = $data['game_id'];
        $this->quantity = $data['quantity'];
        $this->price = $data['price'];
    }

    public function toArray(): array
    {
        return [
            'order_id' => $this->order_id,
            'game_id' => $this->game_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }
}
