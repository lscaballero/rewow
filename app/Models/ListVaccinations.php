<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListVaccinations extends Model
{
    protected $table = 'list_vaccinations';

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
