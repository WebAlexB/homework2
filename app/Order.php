<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
class Order extends Model
{
    protected $fillable = [
        'id', 'user_id', 'status_id', 'shopping_data_customer', 'shopping_data_country',
        'shopping_data_city', 'shopping_data_address', 'total_price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(\App\OrderStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(\App\Product::class,
            'order_products',
            'order_id',
            'product_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(\App\User::class);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        $OrderStatus = OrderStatus::where('id', $this->status_id)->get(['name']);
        return $OrderStatus[0]['name'];
    }

    /**
     * @return mixed
     */
    public function InProcess()
    {
        $InProcess = OrderStatus::where(
            'name',
            '=',
            Config::get('constants.db.order_statuses')[0]
        )->first();
        return $InProcess->id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        $userName = User::where('id', $this->user_id)->get(['name']);
        return $userName[0]['name'];
    }
}
