<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Key extends Model
{
    use HasFactory;


    public function game() : BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}