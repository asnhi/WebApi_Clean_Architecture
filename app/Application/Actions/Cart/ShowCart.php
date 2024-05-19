<?php
declare(strict_types=1);

namespace App\Application\Actions\Cart;

use Illuminate\Http\Request;
use App\Application\Service\CartService;

class ShowCart
{
    protected $builder;

    public function __construct(CartService $builder)
    {
        $this->builder = $builder;
    }

    public function execute()
    {
        return $this->builder->showCart();
    }
}
