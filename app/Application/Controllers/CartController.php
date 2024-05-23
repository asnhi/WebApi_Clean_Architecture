<?php
declare(strict_types=1);
namespace App\Application\Controllers;

use Illuminate\Http\Request;
use App\Application\Actions\Cart\AddCart;
use App\Application\Actions\Cart\UpdateCart;
use App\Application\Actions\Cart\ShowCart;
use App\Application\Actions\Cart\RemoveCart;
use App\Application\Actions\Cart\CreateCart;

class CartController extends Controller
{
    private $addCart;
    private $updateCart;
    private $showCart;
    private $removeCart;
    private $createCart;

    public function __construct(AddCart $addCart, UpdateCart $updateCart, ShowCart $showCart, RemoveCart $removeCart, CreateCart $createCart  )
    {
        $this->addCart = $addCart;
        $this->updateCart = $updateCart;
        $this->showCart = $showCart;
        $this->removeCart = $removeCart;
        $this->createCart = $createCart;
    }

/**
 * @OA\SecurityScheme(
 *     securityScheme="bearer",
 *     type="apiKey",
 *     name="Authorization",
 *     in="header",
 *     description="Enter token in format (Bearer <token>)"
 * )
 */

    /**
     * @OA\Post(
     *     path="/api/cart/add",
     *     tags={"Cart"},
     *     summary="Thêm vào giỏ hàng",
     *     description="Thêm sản phẩm vào giỏ hàng",
     *     security={{"bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Trò chơi được thêm vào giỏ hàng",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 description="ID của trò chơi"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Thêm vào giỏ hàng thành công"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */
    public function addToCart(Request $request)
    {
        return $this->addCart->execute($request);
    }

    /**
     * @OA\Put(
     *     path="/api/cart/update",
     *     tags={"Cart"},
     *     summary="Cập nhật giỏ hàng với ID trò chơi",
     *     description="Cập nhật sản phẩm trong giỏ hàng",
     *     security={{"bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Thông tin cập nhật trò chơi trong giỏ hàng",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 description="ID của trò chơi"
     *             ),
     *             @OA\Property(
     *                 property="quantity",
     *                 type="integer",
     *                 description="Số lượng"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Đã cập nhật số lượng"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */
    public function updateCart(Request $request)
    {
        return $this->updateCart->execute($request);
    }


    /**
     * @OA\Get(
     *     path="/api/cart",
     *     tags={"Cart"},
     *     summary="Hiển thị giỏ hàng",
     *     description="Hiển thị giỏ hàng hiện tại",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Thông tin giỏ hàng hiện tại",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="ID của trò chơi"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Tên của trò chơi"
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     type="number",
     *                     description="Giá"
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     type="string",
     *                     description="Hình ảnh"
     *                 ),
     *                 @OA\Property(
     *                     property="quantity",
     *                     type="integer",
     *                     description="Số lượng"
     *                 ),
     *                 @OA\Property(
     *                     property="total_price",
     *                     type="number",
     *                     description="Tổng giá khi đã nhân với số lượng"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */
    public function showCart()
    {
        return $this->showCart->execute();
    }

        /**
     * @OA\Delete(
     *     path="/api/cart/remove/{productId}",
     *     tags={"Cart"},
     *     summary="Xóa trò chơi khỏi giỏ hàng (Xóa hết & xóa theo ID)",
     *     description="Xóa sản phẩm khỏi giỏ hàng",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=false,
     *         description="ID của trò chơi cần xóa",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Trò chơi đã được xóa khỏi giỏ hàng"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */
    public function removeFromCart(Request $request, $productId = null)
    {
        return $this->removeCart->execute($request, $productId);
    }

    /**
     * @OA\Post(
     *     path="/api/cart/buy",
     *     tags={"Cart"},
     *     summary="Đặt hàng & thanh toán",
     *     description="Thanh toán giỏ hàng",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Giỏ hàng đã được thanh toán"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */
    public function payCart(Request $request)
    {
        return $this->createCart->execute($request);
    }
    

}
