<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function list_vaccinations()
    {
        return $this->hasMany('App\ListVaccinations');
    }

    public function buy_products()
    {
        return $this->hasMany('App\BuyProduct');
    }

    public function type_pet()
    {
        return $this->belongsTo('App\TypePet', 'type_pet_id');
    }

    public function size_pet()
    {
        return $this->belongsTo('App\SizePet', 'size_pet_id');
    }

    //relación con el usuario
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
