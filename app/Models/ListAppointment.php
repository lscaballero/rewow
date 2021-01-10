<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListAppointment extends Model
{
    protected $table = 'list_appointments';

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function category_appointments()
    {
        return $this->belongsTo('App\CategoryAppointment', 'category_appointments_id');
    }
}
