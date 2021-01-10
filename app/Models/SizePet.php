<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizePet extends Model
{
    protected $table = 'size_pet';

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
