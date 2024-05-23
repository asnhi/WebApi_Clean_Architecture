<?php
declare(strict_types=1);

namespace App\Application\Controllers;


use Illuminate\Http\Request;
use App\Application\Service\GenreService;
use App\Application\Requests\GenreRequest;
use App\Application\Actions\Genre\ShowGenre;
use App\Application\Actions\Genre\CreateGenre;
use App\Application\Actions\Genre\DeleteGenre;

class GenreController extends Controller
{
    
    private $showGenre;
    private $createGenre;
    private $deleteGenre;
    private $genreService;
    

    public function __construct(ShowGenre $showGenre, CreateGenre $createGenre, DeleteGenre $deleteGenre, GenreService $genreService)
    {
        $this->showGenre = $showGenre;
        $this->createGenre = $createGenre;
        $this->deleteGenre = $deleteGenre;
        $this->genreService = $genreService;
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
 * @OA\Get(
 *     path="/api/genre",
 *     tags={"Genre"},
 *     summary="Hiển thị toàn bộ thể loại",
 *     description="Hiển thị tất cả các thể loại trò chơi",
 *     @OA\Response(
 *         response=200,
 *         description="Danh sách các thể loại trò chơi được tìm thấy",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Genre")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Không tìm thấy bất kỳ thể loại trò chơi nào"
 *     )
 * )
 */
    public function showAllGenre()
    {

        return $this->showGenre->handle();
    }

    /**
 * @OA\Get(
 *     path="/api/genre/detail/{id}",
 *     tags={"Genre"},
 *     summary="Hiển thị thể loại theo trò chơi",
 *     description="Hiển thị thể loại của trò chơi với ID được cung cấp",
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
 *         description="Thể loại của trò chơi được tìm thấy",
 *         @OA\JsonContent(
 *             type="object",
 *             ref="#/components/schemas/Genre"
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Không tìm thấy thể loại của trò chơi"
 *     )
 * )
 */
    public function showGenreOfGameID(Request $request)
    {
        $id = (int) $request->input('id');

        return $this->showGenre->showgameOfGenre($id);
    }

/**
 * @OA\Post(
 *     path="/api/genre",
 *     tags={"Genre"},
 *     summary="Tạo mới thể loại trò chơi",
 *     description="Tạo mới một thể loại trò chơi",
 *     security={{"bearer":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Dữ liệu thể loại cần tạo",
 *         @OA\JsonContent(
 *             required={"name"},
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Tên của thể loại trò chơi"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Thể loại trò chơi đã được tạo thành công",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Tạo thành công"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 ref="#/components/schemas/Genre"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Dữ liệu không hợp lệ"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="Genre",
 *     required={"name"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Tên của thể loại game"
 *     )
 * )
 */
    public function createGenre(GenreRequest $request)
    {
        // Validate request data using GameRequest
      
        // Gọi phương thức handle của CreateGame và truyền dữ liệu đã xác thực và instance của GameService
        return $this->createGenre->handle($request, $this->genreService);
    }
    
/**
 * @OA\Delete(
 *     path="/api/genre/{id}",
 *     tags={"Genre"},
 *     summary="Xóa thể loại",
 *     description="Xóa thể loại trò chơi",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của loại trò chơi cần xóa",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Thể loại đã được xóa thành công",
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
 *         description="Không tìm thấy thể loại với ID đã cung cấp"
 *     )
 * )
 */
    public function deleteGenre(GenreService $genreService, Request $request)
    {
        // Không cần validate dữ liệu ở đây vì DeleteGame không cần dữ liệu từ request
        
        // Gọi phương thức handle của DeleteGame và truyền instance của GameService và id
        return $this->deleteGenre->handle($genreService, (int) $request->id);
    }
    
}
