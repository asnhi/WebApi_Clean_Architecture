<?php

declare(strict_types=1);

namespace App\Application\Service;

use Illuminate\Database\Eloquent\Builder;
use App\Domain\Entities\Game;
use App\Domain\Entities\Publisher;
use App\Domain\Factories\PublisherFactory;
use App\Domain\ValueObjects\PublisherValueObject;

class PublisherService {
    public function newGenre(PublisherValueObject $data)
    {
        // Sử dụng factory để tạo ra đối tượng Game từ dữ liệu đầu vào
        $genre = Publisher::create($data->toArray());

        // Lưu game vào cơ sở dữ liệu
        $genre->save();

        return $genre;
    }

        // public function findGameofGenre($id)
        // {
        //         return Game::where('publisher_id', $id)->get();
        // }

        public function findID($id)
        {
            $genre = Publisher::findOrFail($id);
            return $genre;
        }

}
