<?php
declare(strict_types=1);
namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'name', 'description', 'price', 'image', 'publisher_id', 'like', 'status'
    ];
    protected $table = 'games';

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre', 'game_id', 'genre_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'game_id', 'order_id');
    }
    public function keys()
    {
        return $this->hasMany(Key::class);
    }
    protected static function boot()
{
    parent::boot();


    static::deleting(function ($game) {
        // Trước khi xóa trò chơi, xóa tất cả các liên kết trong bảng trung gian game_genre
        $game->genres()->detach();
    });
}

    



    public function scopeByPublisher(Builder $query, $genre)
    {
        return $query->where('publisher_id', $genre);
    }

    public function scopePopular(Builder $query)
    {
        return $query->orderByDesc('like');
    }

    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }

}
