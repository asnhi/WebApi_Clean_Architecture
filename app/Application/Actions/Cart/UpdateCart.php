<?php
declare(strict_types=1);
namespace App\Application\Actions\Cart;

use Illuminate\Http\Request;
use App\Application\Service\CartService;

class UpdateCart
{
    protected $builder;

    public function __construct(CartService $builder)
    {
        $this->builder = $builder;
    }

    public function execute(Request $request)
    {
        return $this->builder->updateCart($request);
    }
}
