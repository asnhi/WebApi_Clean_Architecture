<?php
declare(strict_types=1);

namespace App\Application\Controllers;

use Illuminate\Http\Request;
use App\Application\Actions\User\RegisterUser;
use App\Application\Actions\User\LoginUser;
use App\Application\Requests\UserRequest;
use App\Application\Service\UserService;
use App\Application\Actions\User\LogoutUser;
use App\Application\Actions\User\ShowUser;



class AuthController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:api', ['except'=>['login', 'register']]);

    // }

    private $createUser;
    private $userService;
    private $loginUser;
    private $logoutUser;
    private $showUser;


    public function __construct(RegisterUser $createUser, LoginUser $loginUser, LogoutUser $logoutUser, ShowUser $showUser, UserService $userService)
    {
        $this->createUser = $createUser;
        $this->userService = $userService;
        $this->loginUser = $loginUser;
        $this->logoutUser = $logoutUser;
        $this->showUser = $showUser;
    }

    /**
 * @OA\Post(
 *     path="/api/auth/register",
 *     tags={"Authentication"},
 *     description="Đăng ký tài khoản mới",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Dữ liệu tài khoản cần đăng ký",
 *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Tài khoản đã được đăng ký thành công",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Thông báo đăng ký thành công"
 *             ),
 *             @OA\Property(
 *                 property="user",
 *                 ref="#/components/schemas/User"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Dữ liệu không hợp lệ"
 *     )
 * )
 */


    public function register(UserRequest $request)
    {
        return $this->createUser->handle($request, $this->userService);
    }


/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     tags={"Authentication"},
 *     description="Đăng nhập vào tài khoản",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Dữ liệu đăng nhập",
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="Địa chỉ email của người dùng"
 *             ),
 *             @OA\Property(
 *                 property="password",
 *                 type="string",
 *                 format="password",
 *                 description="Mật khẩu của người dùng"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Đăng nhập thành công",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="access_token",
 *                 type="string",
 *                 description="JWT token cho việc xác thực"
 *             ),
 *             @OA\Property(
 *                 property="token_type",
 *                 type="string",
 *                 description="Loại token"
 *             ),
 *             @OA\Property(
 *                 property="expires_in",
 *                 type="integer",
 *                 description="Thời gian sống của token (tính bằng giây)"
 *             ),
 *             @OA\Property(
 *                 property="user",
 *                 ref="#/components/schemas/User"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Email hoặc mật khẩu không đúng"
 *     )
 * )
 */

    public function login(Request $request)
    {
        return $this->loginUser->handle($request);
    }

/**
 * @OA\Get(
 *     path="/api/auth/profile",
 *     tags={"Authentication"},
 *     description="Xem thông tin tài khoản của người dùng hiện tại",
 *     security={{ "bearerAuth":{} }},
 *     @OA\Response(
 *         response=200,
 *         description="Thông tin tài khoản",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     )
 * )
 */
    
    public function profile(){
        return $this->showUser->showInfoUser();
    }

/**
 * @OA\Post(
 *     path="/api/auth/logout",
 *     tags={"Authentication"},
 *     description="Đăng xuất tài khoản",
 *     security={{ "bearerAuth":{} }},
 *     @OA\Response(
 *         response=200,
 *         description="Đăng xuất thành công",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Thông báo đăng xuất thành công"
 *             )
 *         )
 *     )
 * )
 */
    public function logout(){
        return $this->logoutUser->handle();
    }

///////////////////////////////////////////////////////////////
/**
 * @OA\Schema(
 *     schema="UserRequest",
 *     required={"email", "password"},
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="Địa chỉ email của người dùng"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         format="password",
 *         description="Mật khẩu của người dùng"
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="User",
 *     required={"id", "email", "created_at", "updated_at"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID của người dùng"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="Địa chỉ email của người dùng"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Thời điểm tạo tài khoản"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Thời điểm cập nhật tài khoản"
 *     )
 * )
 */

}
