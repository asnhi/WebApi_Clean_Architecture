<?php
declare(strict_types=1);
namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'total' => 'required|numeric',
            'order_status' => 'required|string|in:Pending,Done,Canceled',
            'pay_type' => 'required|string|in:VNPAY',
            'order_id_ref' => 'required|string',
        ];
    }
}
