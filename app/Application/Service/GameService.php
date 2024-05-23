<?php

declare(strict_types=1);

namespace App\Application\Service;


use App\Domain\Entities\Game;
use App\Domain\Entities\Genre;
use App\Domain\Entities\Publisher;
use App\Domain\ValueObjects\GameValueObject;

class GameService
{
    public function findGameByID($id)
    {
        $game = Game::find($id);

        if ($game) {
            return response()->json($game);
        } else {
            return response()->json(['message' => 'Game not found'], 404);
        }
    }

    public function filterGamesByPrice($fromPrice)
    {
        $query = Game::query();
        if ($fromPrice) {
            $query->where('price', '>=', $fromPrice);
        }
        return $query->get();
    }
    
    public function newGame(GameValueObject $data)
    {
        // Sử dụng factory để tạo ra đối tượng Game từ dữ liệu đầu vào
        $game = Game::create($data->toArray());

        // Lưu game vào cơ sở dữ liệu
        $game->save();

        return $game;
    }
    
    public function findID($id)
    {
    
        return $game = Game::findOrFail($id);
    }

    // public function findGenreOfID($id)
    // {
    
    //     $game = Game::findOrFail($id);
    //     $genres = $game->genres->pluck('name');

    //     return $genres;
    // }


    public function searchGame($keyword)
    {
        return Game::where('name', 'like', '%' . $keyword . '%')->get();
    }

    //Trong ShowGame.php -> vì chỉ hiện in4 của Game đó thôi
    public function findPublisherOfGame($id)
    {
        return Publisher::where('id', $id)->get('name');
    }

    // Phương thức tùy chỉnh để lấy các trò chơi phổ biến
    public function popular()
    {
        // Tạo một truy vấn sử dụng model Game
        $query = Game::query();
    
        // Lấy các bản ghi có trường 'like' lớn hơn 300 và sắp xếp theo số lượng like giảm dần
        $popularGames = $query->where('like', '>', 300)->orderByDesc('like')->take(5)->get();
    
        return $popularGames;
    }
    
    
    public function topPopular()
    {
        // Tạo một truy vấn sử dụng model Game
        $query = Game::query();
    
        // Sắp xếp các kết quả theo số lượng like giảm dần
        $popularGame = $query->orderByDesc('like')->first();
    
        return $popularGame;
    }

}
