<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Entities\Game;
use App\Domain\Entities\Genre;
use App\Domain\ValueObjects\GenreValueObject;


class GenreService {
    public function newGenre(GenreValueObject $data)
    {
        // Sử dụng factory để tạo ra đối tượng Game từ dữ liệu đầu vào
        $genre = Genre::create($data->toArray());

        // Lưu game vào cơ sở dữ liệu
        $genre->save();

        return $genre;
    }

    public function findGameofGenre($id)
    {
        $genre = Genre::findOrFail($id);
        $games = $genre->games;
        return $games;
    }
    

        public function findID($id)
        {
            $genre = Genre::findOrFail($id);
            return $genre;
        }

}
