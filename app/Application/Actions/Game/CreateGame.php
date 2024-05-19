<?php
declare(strict_types=1);

namespace App\Application\Actions\Game;

use App\Application\Requests\GameRequest;
use App\Application\Service\GameService;
use App\Domain\ValueObjects\GameValueObject;


class CreateGame
{
    public static function handle(GameRequest $request, GameService $builder)
    {
        // Validate yêu cầu và trích xuất dữ liệu đã được xác nhận
        $validatedData = $request->validated();

        // Tạo một game mới từ dữ liệu đã được xác nhận
        $gameValueObject = new GameValueObject($validatedData);

        // Tạo một game mới từ đối tượng GameValueObject đã được tạo
        $game = $builder->newGame($gameValueObject);

        return $game;
    }
}
