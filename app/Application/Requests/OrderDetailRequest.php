<?php
declare(strict_types=1);
namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_id' => 'required|integer|exists:orders,id',
            'game_id' => 'required|integer|exists:games,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }
}
