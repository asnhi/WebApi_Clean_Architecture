<?php
declare(strict_types=1);
namespace App\Application\Controllers;

use Illuminate\Http\Request;
use App\Application\Actions\Cart\AddCart;
use App\Application\Actions\Cart\UpdateCart;
use App\Application\Actions\Cart\ShowCart;
use App\Application\Actions\Cart\RemoveCart;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    private $addCart;
    private $updateCart;
    private $showCart;
    private $removeCart;

    public function __construct(AddCart $addCart, UpdateCart $updateCart, ShowCart $showCart, RemoveCart $removeCart )
    {
        $this->addCart = $addCart;
        $this->updateCart = $updateCart;
        $this->showCart = $showCart;
        $this->removeCart = $removeCart;
    }

    
    public function addToCart(Request $request)
    {
        return $this->addCart->execute($request);
    }

    public function updateCart(Request $request)
    {
        return $this->updateCart->execute($request);
    }

    public function showCart()
    {
        return $this->showCart->execute();
    }

    public function removeCartByIDGame(int $id)
    {
        return $this->removeCart->execute($id);
    }

    public function removeAllCart()
    {
        // Lấy thông tin giỏ hàng từ cache
        $userId = auth()->id();
        $cartKey = 'cart:' . $userId;
        $cart = Cache::get($cartKey, []);
    
        // Kiểm tra xem giỏ hàng có sản phẩm không
        if (!empty($cart)) {
            // Xóa toàn bộ giỏ hàng
            Cache::forget($cartKey);
    
            // Trả về phản hồi JSON thành công
            return response()->json([
                'success' => true, 
                'message' => 'Xóa giỏ hàng thành công'
            ]);
        } else {
            // Trả về phản hồi JSON nếu giỏ hàng không có sản phẩm
            return response()->json([
                'success' => false, 
                'message' => 'Giỏ hàng đã trống'
            ], 404); // Trả về mã lỗi 404 NOT FOUND
        }
    }
    

}
