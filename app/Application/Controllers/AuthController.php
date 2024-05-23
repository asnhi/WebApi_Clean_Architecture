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
 * @OA\Info(title="My API", version="1.0")
 * @OA\SecurityScheme(
 *     securityScheme="bearer",
 *     type="apiKey",
 *     name="Authorization",
 *     in="header",
 *     description="Enter token in format (Bearer <token>)"
 * )
 */

 /**
     * @OA\POST(
     *     path="/api/register",
     *     tags={"Authentication"},
     *     summary="Đăng ký",
     *     description="Đăng ký tài khoản",
     *     operationId="register",
     *     @OA\RequestBody(
     *         description="Nhập thông tin đăng ký tài khoản",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *            @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     description="User Name",
     *                     type="string",
     *                     example="Anh Nhi"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     description="User Email",
     *                     type="string",
     *                     example="nhi@gmail.com"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="User password",
     *                     type="string",
     *                     example="123456"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirmation",
     *                     description="User confirm password",
     *                     type="string",
     *                     example="123456"
     *                 ),
     *                 required={"name", "email", "password", "password_confirmation"}
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Đăng ký tài khoản thành công",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */


    public function register(UserRequest $request)
    {
        return $this->createUser->handle($request, $this->userService);
    }
    /**
     * @OA\POST(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="Đăng nhập",
     *     description="Đăng nhập vào cửa hàng",
     *     operationId="login",
     *     @OA\RequestBody(
     *         description="Nhập thông tin đăng nhập",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *            @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="Địa chỉ email của người dùng",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Mật khẩu của người dùng",
     *                     type="string"
     *                 ),
     *                 required={"email", "password"}
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Đăng nhập thành công",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dữ liệu không hợp lệ"
     *     )
     * )
     */

    public function login(Request $request)
    {
        return $this->loginUser->handle($request);
    }

    /**
     * @OA\Get(
     *     path="/api/profile",
     *     tags={"Authentication"},
     *     summary="Hồ sơ người dùng",
     *     description="Hồ sơ người mua hàng (người dùng)",
     *     operationId="show",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Hiển thị hồ sơ người dùng",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Không xác thực được người dùng"
     *     )
     * )
     */
    
    public function profile(){
        return $this->showUser->showInfoUser();
    }

    /**
     * @OA\POST(
     *     path="/api/logout",
     *     tags={"Authentication"},
     *     summary="Đăng xuất",
     *     description="Đăng xuất người dùng",
     *     operationId="logout",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Đăng xuất thành công",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Không xác thực được người dùng"
     *     )
     * )
     */
    public function logout(){
        return $this->logoutUser->handle();
    }

}
