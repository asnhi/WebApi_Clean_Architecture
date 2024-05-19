<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    const ORDER_STATUS = [
        'Pending',
        'Done',
        'Canceled'
    ];

    const PAY_TYPE = [
        'VNPAY'
    ];

    public $timestamps = false;
    protected $fillable = [
        'user_id', 'total', 'order_status', 'pay_type', 'order_id_ref',
    ];

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'order_details', 'order_id', 'game_id');
    }
    
}
