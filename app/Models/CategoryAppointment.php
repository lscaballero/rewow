<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAppointment extends Model
{
    protected $table = 'category_appointments';

    public function list_appointments()
    {
        return $this->hasMany('App\ListAppointment');
    }
}
