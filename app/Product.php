<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'title', 'description', 'short_description', 'sku',
        'price', 'discount', 'in_stock', 'count', 'thumbnail'
    ];

    protected $casts = [
        'in_stock' => 'boolean',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function image()
    {
        return $this->belongsToMany(\App\ProductImage::class,
            'product_images',
            'product_id',
            'image_path')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsToMany(\App\Category::class,
            'product_categories',
            'product_id',
            'category_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function order()
    {
        return $this->belongsToMany(\App\Order::class);
    }

    public function followers()
    {
        return $this->belongsToMany(\App\User::class,
            'wishlist',
            'product_id',
            'id');
    }

    /**
     * @param $value
     */
    public function setThumbnailAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['thumbnail'] =
                str_replace('public/storage/', '', $value);
        }
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        if ($this->in_stock === 0) {
            $price = $this->price;
        } else {
            $price = $this->price - $this->discount;
        }
        return $price;
    }
}
