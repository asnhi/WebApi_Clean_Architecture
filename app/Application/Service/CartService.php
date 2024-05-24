<?php
declare(strict_types=1);
namespace App\Application\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Domain\Entities\Game;
use App\Domain\Entities\Key;
use Carbon\Carbon;

use Illuminate\Support\Str;
use App\Domain\ValueObjects\OrderDetailValueObject;
use App\Domain\ValueObjects\OrderValueObject;


class CartService
{

    protected $orderService;
    protected $orderDetailService;

    public function __construct(OrderService $orderService, OrderDetailService $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

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
    protected function removeCartInCache()
    {
        $cartKey = 'cart:' . auth()->id();
        Cache::forget($cartKey);
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

    public function removeFromCart(Request $request, $productId = null)
    {
        // Lấy giỏ hàng từ cache
        $cart = $this->getCart();

        // Kiểm tra xem giỏ hàng có trống không
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Giỏ hàng đã trống'
            ], 404);
        }

        if ($productId) {
            // Xóa sản phẩm cụ thể khỏi giỏ hàng
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                $this->saveCartInCache($cart);

                return response()->json([
                    'success' => true,
                    'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Sản phẩm không tồn tại trong giỏ hàng'
                ], 404);
            }
        } else {
            // Xóa toàn bộ giỏ hàng
            $this->removeCartInCache();

            return response()->json([
                'success' => true,
                'message' => 'Xóa giỏ hàng thành công'
            ]);
        }
    }


    public function payCart(Request $request)
    {
        try {
            // Lấy thông tin người dùng đang đăng nhập
            $user = Auth::user();
    
            // Lấy thông tin giỏ hàng từ session
            $cart = $this->getCart();
    
            // Kiểm tra giỏ hàng có sản phẩm không
            if (empty($cart)) {
                return response()->json(['error' => 'Giỏ hàng của bạn đang trống.'], 400);
            }
    
            // Tạo đơn hàng mới
            $order = $this->createOrder($user, $cart);
    
            // Xóa giỏ hàng sau khi đã đặt hàng thành công
            $this->removeCartInCache();
    
            return response()->json(['message' => 'Đơn hàng của bạn đã được đặt thành công.'], 200);
        } catch (\Exception $ex) {
            return response()->json(['error' => 'Đã xảy ra lỗi khi đặt hàng.'], 500);
        }
    }
    
    private function createOrder($user, $cart)
    {
        $currentTime = Carbon::now();
    
        // Tạo đơn hàng mới
        $orderValueObject = new OrderValueObject([
            'user_id' => $user->id,
            'total' => $this->calculateTotalPrice($cart), // Tính tổng giá trị đơn hàng
            'order_status' => 'Pending',
            'pay_type' => 'VNPAY',
            'order_id_ref' => Str::upper(Str::random(8)), // Mã đơn hàng tham chiếu
            'created_at' => $currentTime,
            'updated_at' => $currentTime,
        ]);
    
        // Tạo đơn hàng
        $order = $this->orderService->createOrder($orderValueObject);
    
        // Lưu thông tin chi tiết đơn hàng
        $this->saveOrderDetails($order, $cart, $currentTime);
    
        return $order;
    }
    
    private function calculateTotalPrice($cart)
    {
        $totalPrice = 0;
    
        foreach ($cart as $productId => $productData) {
            $product = Game::find($productId);
            if ($product) {
                $totalPrice += $product->price * $productData['quantity'];
            }
        }
    
        return $totalPrice;
    }
    
    private function saveOrderDetails($order, $cart, $currentTime)
    {
        foreach ($cart as $productId => $productData) {
            $product = Game::find($productId);
            if ($product) {
                $orderDetailValueObject = new OrderDetailValueObject([
                    'order_id' => $order->id,
                    'game_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $product->price,
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime,
                ]);
    
                // Tạo chi tiết đơn hàng
                $this->orderDetailService->createOrderDetail($orderDetailValueObject);
    
                // Giảm số lượng key trong cơ sở dữ liệu
                $this->reduceKeys($product, $productData['quantity'], $currentTime);
            }
        }
    }
    
    private function reduceKeys($product, $quantity, $currentTime)
    {
        $keysToReduce = min($quantity, $product->availableKeys());
    
        for ($i = 0; $i < $keysToReduce; $i++) {
            $key = Key::where('game_id', $product->id)
                        ->where('is_expired', 0)
                        ->where('is_redeemed', 0)
                        ->first();
            if ($key) {
                $key->is_redeemed = 1;
                $key->updated_at = $currentTime;
                $key->save();
            }
        }
    }
    
    // public function payCart(Request $request)
    // {
    //     // Lấy thông tin người dùng đang đăng nhập
    //     $user = Auth::user();

    //     // Lấy thông tin giỏ hàng từ session
    //     $cart = $this->getCart();

    //     // Kiểm tra giỏ hàng có sản phẩm không
    //     if (empty($cart)) {
    //         return response()->json(['error' => 'Giỏ hàng của bạn đang trống.'], 400);
    //     }

    //     $currentTime = Carbon::now();

    //     // Tạo đơn hàng mới
    //     $orderValueObject = new OrderValueObject([
    //         'user_id' => $user->id,
    //         'total' => 0, // Sẽ cập nhật sau khi tính tổng giá trị đơn hàng
    //         'order_status' => 'Pending',
    //         'pay_type' => 'VNPAY',
    //         'order_id_ref' => Str::upper(Str::random(8)), // Mã đơn hàng tham chiếu
    //         'created_at' => $currentTime,
    //         'updated_at' => $currentTime,
    //     ]);

    //     // Tạo đơn hàng
    //     $order = $this->orderService->createOrder($orderValueObject);

    //     $totalPrice = 0;

    //     // Lưu thông tin chi tiết đơn hàng (order_details) và tính tổng giá trị đơn hàng
    //     foreach ($cart as $productId => $productData) {
    //         $product = Game::find($productId);
    //         if ($product) {
    //             $orderDetailValueObject = new OrderDetailValueObject([
    //                 'order_id' => $order->id,
    //                 'game_id' => $product->id,
    //                 'quantity' => $productData['quantity'],
    //                 'price' => $product->price,
    //                 'created_at' => $currentTime,
    //                 'updated_at' => $currentTime,
                    
    //             ]);

    //             // Tạo chi tiết đơn hàng
    //             $this->orderDetailService->createOrderDetail($orderDetailValueObject);

    //             // Tính tổng giá trị đơn hàng
    //             $totalPrice += $product->price * $productData['quantity'];

    //             // Giảm số lượng key trong cơ sở dữ liệu
    //             // Sử dụng phương thức availableKeys() để lấy số lượng keys có sẵn
    //             $keysToReduce = min($productData['quantity'], $product->availableKeys());

    //             for ($i = 0; $i < $keysToReduce; $i++) {
    //                 $key = Key::where('game_id', $product->id)
    //                             ->where('is_expired', 0)
    //                             ->where('is_redeemed', 0)
    //                             ->first();
    //                 if ($key) {
    //                     $key->is_redeemed = 1;
    //                     $key->updated_at = $currentTime;
    //                     $key->save();
    //                 }
    //             }
    //         }
    //     }

    //     // Cập nhật tổng giá trị đơn hàng
    //     $order->total = $totalPrice;
    //     $order->save();

    //     // Xóa giỏ hàng sau khi đã đặt hàng thành công
    //     $this->removeCartInCache();

    //     return response()->json(['message' => 'Đơn hàng của bạn đã được đặt thành công.'], 200);
    // }
}
