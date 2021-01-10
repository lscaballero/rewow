<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyProduct extends Model
{
    protected $table = 'buy_products';

    public function pets()
    {
        return $this->belongsTo('App\Models\Pets', 'pet_id');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Prduct', 'product_id');
    }
}
