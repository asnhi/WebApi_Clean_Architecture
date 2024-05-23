<?php

declare(strict_types=1);

namespace App\Application\Actions\Game;


use App\Application\Service\GameService;
use App\Domain\Entities\Game;

class ShowGame
{
    private $builder;

    public function __construct(GameService $builder)
    {
        $this->builder = $builder;
    }

    // public function handle()
    // {
    //     $games = Game::all();
    
    //     return response()->json($games);
    // }
    
    ////////////////////////*TRANG CHỦ*//////////////////////////////////////

    // public function showGenreOfGame(int $id)
    // {
    //     $game = $this->builder->findGenreOfID($id);

    //     return response()->json($game);
    // }

    public function findGame(int $id)
    {
        $game = $this->builder->findGameByID($id);

        return response()->json($game);
    }


    public function showResultSearch(string $keyword)
    {
        // Thực hiện tìm kiếm game với keyword
        $games = $this->builder->searchGame($keyword);
        return response()->json($games);
    }

    public function searchGameByPrice(int $fromPrice)
    {
        $games = $this->builder->filterGamesByPrice($fromPrice);
        return response()->json($games);
    }

    public function showFavorate()
    {

        // Lấy các trò chơi phổ biến (được sắp xếp theo số lượng like giảm dần)
        $favorateGames = $this->builder->popular();

        return response()->json($favorateGames);
    }


    public function showPublisher()
    {

        // Lấy các trò chơi phổ biến (được sắp xếp theo số lượng like giảm dần)
        $favorateGames = $this->builder->topPopular();

        return $favorateGames;
    }
}
