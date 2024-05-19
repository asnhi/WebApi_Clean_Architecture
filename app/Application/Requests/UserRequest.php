<?php
declare(strict_types=1);

namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'gender' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
