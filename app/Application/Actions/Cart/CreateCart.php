<?php
declare(strict_types=1);
namespace App\Application\Actions\Cart;


use App\Application\Service\CartService;
use Illuminate\Http\Request;

class CreateCart
{
    protected $builder;

    public function __construct(CartService $builder)
    {
        $this->builder = $builder;
    }

    public function execute(Request $request)
    {
        return $this->builder->payCart($request);
    }
}

