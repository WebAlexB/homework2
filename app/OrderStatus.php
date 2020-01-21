<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class OrderStatus extends Model
{
    protected $fillable = [
        'id', 'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(\App\Order::class);
    }

    public function getIdByName(string $nameStatus): int
    {
        return $idOrderStatus = $this->where(
            'name',
            '=',
            $nameStatus
        )->first('id');
    }

}
