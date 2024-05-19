<?php
declare(strict_types=1);
namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PublisherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:publishers,name',
        ];
    }

}
