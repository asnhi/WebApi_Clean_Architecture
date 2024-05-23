<?php
declare(strict_types=1);

namespace App\Application\Controllers;


use Illuminate\Http\Request;
use App\Application\Service\GameService;
use App\Application\Requests\GameRequest;
use App\Application\Actions\Game\ShowGame;
use App\Application\Actions\Game\CreateGame;
use App\Application\Actions\Game\DeleteGame;

class GameController extends Controller
{
    
    private $showGame;
    private $createGame;
    private $deleteGame;
    private $gameService;
    

    public function __construct(ShowGame $showGame, CreateGame $createGame, DeleteGame $deleteGame, GameService $gameService)
    {
        $this->showGame = $showGame;
        $this->createGame = $createGame;
        $this->deleteGame = $deleteGame;
        $this->gameService = $gameService;
    }


    // public function showGenreOfGameID(Request $request)
    // {
    //     $id = (int) $request->input('id');

    //     return $this->showGame->showGenreOfGame($id);
    // }
    
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
 * @OA\Get(
 *     path="/api/game/search",
 *     tags={"Game"},
 *     summary="Tìm kiếm (Theo tên thể loại và giá)",
 *     description="Tìm kiếm trò chơi theo từ khóa hoặc giá từ một mức giá cụ thể",
 *     @OA\Parameter(
 *         name="keyword",
 *         in="query",
 *         required=false,
 *         description="Từ khóa để tìm kiếm trò chơi",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="fromPrice",
 *         in="query",
 *         required=false,
 *         description="Giá tối thiểu để tìm kiếm trò chơi",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Danh sách trò chơi được tìm thấy",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Game")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Không tìm thấy trò chơi nào"
 *     )
 * )
 */
/**
 * @OA\Schema(
 *     schema="Game",
 *     required={"id", "name", "description", "price", "image", "publisher_id", "like", "status"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Tên của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Mô tả của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="double",
 *         description="Giá của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         description="Đường dẫn hình ảnh của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="publisher_id",
 *         type="integer",
 *         description="ID của nhà xuất bản",
 *     ),
 *     @OA\Property(
 *         property="like",
 *         type="integer",
 *         description="Số lượt thích của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Trạng thái của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Thời điểm tạo bản ghi"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Thời điểm cập nhật bản ghi"
 *     )
 * )
 */

    public function showSearch(Request $request)
    {
        $keyword = $request->query('keyword');
        $fromPrice = (int) $request->query('fromPrice');
    
        if ($keyword !== null && $keyword !== '') {
            return $this->showGame->showResultSearch($keyword); // Truyền giá trị keyword
        } elseif ($fromPrice > 0) {
            return $this->showGame->searchGameByPrice($fromPrice); // Truyền giá trị fromPrice
        }
    }
    
    /**
     * @OA\Get(
     *     path="/api/game/detail/{id}",
     *     tags={"Game"},
     *     summary="Chi tiết trò chơi",
     *     description="Hiển thị thông tin chi tiết của một trò chơi",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID của trò chơi",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Thông tin chi tiết của trò chơi",
     *         @OA\JsonContent(ref="#/components/schemas/Game")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Không tìm thấy trò chơi"
     *     )
     * )
     */
    public function showGameByID(Request $request)
    {
        return $this->showGame->findGame((int) $request->id);
    }

    /**
     * @OA\Get(
     *     path="/api/game/favorate",
     *     tags={"Game"},
     *     summary="Được yêu thích nhất",
     *     description="Trả về top 5 các game được yêu thích",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */

    public function showFavorate()
    {
        return $this->showGame->showFavorate();
    }

/**
 * @OA\Schema(
 *     schema="GameRequest",
 *     required={"name", "description", "price", "image", "publisher_id", "like", "status"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Tên của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Mô tả của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="double",
 *         description="Giá của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         description="Đường dẫn hình ảnh của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="publisher_id",
 *         type="integer",
 *         description="ID của nhà xuất bản",
 *     ),
 *     @OA\Property(
 *         property="like",
 *         type="integer",
 *         description="Số lượt thích của trò chơi"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Trạng thái của trò chơi"
 *     )
 * )
 */

/**
 * @OA\Post(
 *     path="/api/game",
 *     tags={"Game"},
 *     summary="Tạo trò chơi",
 *     description="Tạo mới một trò chơi",
 *     security={{"bearer":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Dữ liệu trò chơi cần tạo",
 *         @OA\JsonContent(ref="#/components/schemas/GameRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Trò chơi đã được tạo thành công",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Tạo thành công"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 ref="#/components/schemas/Game"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Dữ liệu không hợp lệ"
 *     )
 * )
 */
    public function createGame(GameRequest $request)
    {
        // Validate request data using GameRequest
      
        // Gọi phương thức handle của CreateGame và truyền dữ liệu đã xác thực và instance của GameService
        return $this->createGame->handle($request, $this->gameService);
    }
    
/**
 * @OA\Delete(
 *     path="/api/game/{id}",
 *     tags={"Game"},
 *     summary="Xóa trò chơi",
 *     description="Xóa một trò chơi",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của trò chơi cần xóa",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Trò chơi đã được xóa thành công",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Thông báo thành công"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Không tìm thấy trò chơi với ID đã cung cấp"
 *     )
 * )
 */
    public function deleteGame(GameService $gameService, Request $request)
    {
        // Không cần validate dữ liệu ở đây vì DeleteGame không cần dữ liệu từ request
        
        // Gọi phương thức handle của DeleteGame và truyền instance của GameService và id
        return $this->deleteGame->handle($gameService, (int) $request->id);
    }
    
}
