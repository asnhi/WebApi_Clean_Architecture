<?php
declare(strict_types=1);
namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;


// Mục đích để kiểm tra và xác thực dữ liệu được gửi từ client 
// trước khi chúng được xử lý trong controller. 
// Bằng cách này, có thể đảm bảo dữ liệu được gửi lên từ client là hợp lệ 
// và an toàn trước khi lưu vào cơ sở dữ liệu hoặc thực hiện các thao tác khác.

class GenreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:genres,name',
        ];
    }

}
