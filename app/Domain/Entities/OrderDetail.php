<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'order_id', 'game_id', 'quantity', 'price',
    ];

    protected $table = 'order_details';

}
