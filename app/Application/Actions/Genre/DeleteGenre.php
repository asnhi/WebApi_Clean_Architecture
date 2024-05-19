<?php
declare(strict_types=1);

namespace App\Application\Actions\Genre;
use App\Application\Service\GenreService;

class DeleteGenre
{
    public static function handle(GenreService $builder, int $id)
    {
        // Tìm game theo ID hoặc nếu không tìm thấy, sinh ra một ngoại lệ
        $genre = $builder->findID($id);
        
        $genre->delete();

        // Trả về true để chỉ ra rằng game đã được xóa thành công
        return 'Xóa thành công';
    }
}
