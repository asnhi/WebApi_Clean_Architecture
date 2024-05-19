<?php
declare(strict_types=1);
namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:games,name',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required',
            'publisher_id' => 'required|integer',
            'like' => 'required|integer',
            'status' => 'required|string',
        ];
    }
}
