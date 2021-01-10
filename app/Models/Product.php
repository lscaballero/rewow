<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function buy_products()
    {
        return $this->hasMany('App\Models\BuyProduct');
    }

    public function category_products()
    {
        return $this->belongsTo('App\Models\CategoryProduct', 'category_product_id');
    }
}
