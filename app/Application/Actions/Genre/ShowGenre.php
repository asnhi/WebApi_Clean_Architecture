<?php

declare(strict_types=1);

namespace App\Application\Actions\Genre;
use Illuminate\Http\Request;
use App\Application\Service\GenreService;
use App\Domain\Entities\Genre;

class ShowGenre
{
    private $builder;

    public function __construct(GenreService $builder)
    {
        $this->builder = $builder;
    }
    public function handle()
    {
        $games = Genre::all();
    
        return response()->json($games);
    }
    

    public function showgameOfGenre(int $id)
    {
        $game = $this->builder->findGameofGenre($id);

        return response()->json($game);
    }


}
