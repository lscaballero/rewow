<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePet extends Model
{
    protected $table = 'type_pet';

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
