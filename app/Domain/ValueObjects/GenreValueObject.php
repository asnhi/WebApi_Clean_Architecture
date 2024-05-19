<?php
declare(strict_types=1);

namespace App\Domain\ValueObjects;

class GenreValueObject {
    public $name;

    public function __construct(array $data)
    {

        // Gán các giá trị từ dữ liệu vào các thuộc tính
        $this->name = $data['name'];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,

        ];
    }
}