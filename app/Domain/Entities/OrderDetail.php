<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'order_id', 'game_id', 'quantity', 'price', 'cd_key'
    ];

    protected $table = 'order_details';

    public function user()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
