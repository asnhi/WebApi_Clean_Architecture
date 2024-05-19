<?php
declare(strict_types=1);
namespace App\Application\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Domain\Entities\Game;

class CartService
{
    protected function getCart()
    {
        $userId = auth()->id();
        $cartKey = 'cart:' . $userId;
        return Cache::get($cartKey, []);
    }
    protected function saveCartInCache($cart)
    {
        $cartKey = 'cart:' . auth()->id();
        Cache::put($cartKey, $cart);
    }
    public function addToCart(Request $request)
    {
        // Xử lý logic thêm sản phẩm vào giỏ hàng
        $id = $request->input('id');
        $game = Game::findOrFail($id);
    
        // Lấy thông tin giỏ hàng từ cache
        $cart = $this->getCart();
    
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu đã tồn tại, cập nhật số lượng và tổng giá tiền
            $cart[$id]['quantity']++;
            $cart[$id]['totalPrice'] = $game->price * $cart[$id]['quantity'];
        } else {
            // Nếu chưa tồn tại, thêm mới vào giỏ hàng với số lượng là 1
            $cart[$id] = [
                'id' => $game->id,
                'name' => $game->name,
                'price' => $game->price,
                'image' => $game->image,
                'quantity' => 1,
                'totalPrice' => $game->price
            ];
        }
    
        // Lưu thông tin giỏ hàng vào cache
        $this->saveCartInCache($cart);
    
        // Trả về phản hồi JSON với thông tin giỏ hàng đã được cập nhật
        return response()->json([
            'message' => 'Thêm vào giỏ hàng thành công',
            'cart' => $cart
        ]);
    }

    public function updateCart(Request $request)
    {
        // Xử lý logic cập nhật giỏ hàng
        try {
            $id = $request->input('id');
            $quantity = $request->input('quantity');
    
            // Kiểm tra xem id và quantity có tồn tại không
            if ($id && $quantity) {
                // Lấy thông tin game từ ID
                $game = Game::findOrFail($id);
    
                // Kiểm tra số lượng key có đủ để cập nhật không
                $availableKeys = $game->keys()->where('is_redeemed', 0)->count();
                if ($availableKeys >= $quantity) {
                    // Lấy thông tin giỏ hàng từ cache
                    $cart = $this->getCart();
    
                    // Kiểm tra xem phần tử trong giỏ hàng có tồn tại không
                    if (isset($cart[$id])) {
                        $cart[$id]['quantity'] = $quantity;
                        $cart[$id]['totalPrice'] = $game->price * $cart[$id]['quantity'];
    
                        // Cập nhật giỏ hàng trong cache
                        $this->saveCartInCache($cart);
    
                        // Trả về phản hồi JSON thành công
                        return response()->json([
                            'success' => true, 
                            'message' => 'Cập nhật giỏ hàng thành công',
                            'cart' => $cart
                        ]);
                    } else {
                        // Phần tử không tồn tại trong giỏ hàng
                        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
                    }
                } else {
                    // Trả về phản hồi JSON lỗi nếu số lượng key không đủ
                    return response()->json(['success' => false, 'message' => 'Đã hết hàng']);
                }
            }
        } catch (\Exception $ex) {
            // Trả về phản hồi JSON lỗi nếu có lỗi xảy ra
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi']);
        }
    }

    public function showCart()
    {
        // Xử lý logic hiển thị giỏ hàng
        try {
            // Lấy thông tin giỏ hàng từ cache
            $cart = $this->getCart();
    
            // Trả về phản hồi JSON với thông tin giỏ hàng
            return response()->json([
                'success' => true,
                'cart' => $cart
            ]);
        } catch (\Exception $ex) {
            // Trả về phản hồi JSON lỗi nếu có lỗi xảy ra
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi']);
        }
    }

    public function removeCartByIDGame(int $id)
    {
        // Lấy thông tin giỏ hàng từ cache
        $cart = $this->getCart();
    
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            unset($cart[$id]);
            // Lưu thông tin giỏ hàng vào cache sau khi xóa
            $this->saveCartInCache($cart);
            // Trả về phản hồi JSON thành công
            return response()->json([
                'success' => true, 
                'message' => 'Xóa sản phẩm thành công',
                'cart' => $cart
            ]);
        } else {
            // Trả về phản hồi JSON nếu sản phẩm không tồn tại trong giỏ hàng
            return response()->json([
                'success' => false, 
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng'
            ]);
        }
    }
    


}
