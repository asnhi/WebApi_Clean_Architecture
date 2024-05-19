<?php

declare(strict_types=1);

namespace App\Application\Actions\Publisher;

use App\Application\Service\PublisherService;
use App\Domain\Entities\Publisher;

class ShowPublisher
{
    private $builder;

    public function __construct(PublisherService $builder)
    {
        $this->builder = $builder;
    }
    public function handle()
    {
        $games = Publisher::all();
    
        return response()->json($games);
    }
    

    // public function showgameOfGenre(int $id)
    // {
    //     $game = $this->builder->findGameofGenre($id);

    //     return response()->json($game);
    // }


}
