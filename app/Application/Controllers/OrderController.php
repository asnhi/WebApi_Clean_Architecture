<?php
declare(strict_types=1);

namespace App\Application\Controllers;


use Illuminate\Http\Request;
use App\Application\Service\OrderService;
use App\Application\Requests\OrderRequest;
use App\Application\Actions\Order\ShowOrder;
use App\Application\Actions\Order\CreateOrder;
use App\Application\Actions\Order\DeleteOrder;

class OrderController extends Controller
{
    
    private $showOrder;
    private $createOrder;
    // private $deleteOrder;
    private $orderService;
    

    public function __construct(ShowOrder $showOrder, CreateOrder $createOrder, OrderService $orderService)
    {
        $this->showOrder = $showOrder;
        $this->createOrder = $createOrder;
        // $this->deleteOrder = $deleteOrder;
        $this->orderService = $orderService;
    }

    /**
 * @OA\Get(
 *     path="/api/order/{id}",
 *     tags={"Order"},
 *     summary="Hiển thị tất cả các đơn hàng của người dùng có ID",
 *     description="Trả về tất cả các đơn hàng của người dùng có ID được cung cấp.",
 *     @OA\Parameter(
 *         name="id",
 *         in="query",
 *         required=true,
 *         description="ID của người dùng",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Danh sách đơn hàng của người dùng đó",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Order")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Không tìm thấy đơn hàng nào cho người dùng đã cung cấp"
 *     )
 * )
 */
/**
 * @OA\Schema(
 *     schema="Order",
 *     title="Order",
 *     required={"id", "user_id", "total", "order_status","pay_type","order_id_ref", "created_at", "updated_at"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID của đơn hàng"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         format="int64",
 *         description="ID của người dùng"
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="number",
 *         format="double",
 *         description="Tổng giá trị của đơn hàng"
 *     ),
 *     @OA\Property(
 *         property="order_status",
 *         type="string",
 *         description="Trạng thái của đơn hàng"
 *     ),
 *      @OA\Property(
 *         property="pay_type",
 *         type="string",
 *         description="Ngân hàng thanh toán"
 *     ),
 *      @OA\Property(
 *         property="order_id_ref",
 *         type="string",
 *         description="Mã đơn hàng"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Thời điểm tạo đơn hàng"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Thời điểm cập nhật đơn hàng"
 *     )
 * )
 */

    public function showAllOrder()
    {
        return $this->showOrder->showOrderByUserId();
    }
    
}