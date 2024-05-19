<?php
declare(strict_types=1);

namespace App\Application\Actions\Genre;

use App\Application\Requests\GenreRequest;
use App\Application\Service\GenreService;
use App\Domain\ValueObjects\GenreValueObject;


class CreateGenre
{
    public static function handle(GenreRequest $request, GenreService $builder)
    {
        // Validate yêu cầu và trích xuất dữ liệu đã được xác nhận
        $validatedData = $request->validated();

        // Tạo một game mới từ dữ liệu đã được xác nhận
        $genreValueObject = new GenreValueObject($validatedData);

        // Tạo một game mới từ đối tượng GameValueObject đã được tạo
        $genre = $builder->newGenre($genreValueObject);

        return $genre;
    }
}
