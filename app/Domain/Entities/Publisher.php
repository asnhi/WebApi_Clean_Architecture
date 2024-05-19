<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'publishers';
    public function games()
    {
        return $this->hasMany(Game::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($publisher) {
            // Trước khi xóa thể loại, xóa tất cả các trò chơi liên quan
            $publisher->games()->delete();
        });
    }
}
