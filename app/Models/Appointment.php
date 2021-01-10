<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    public function list_appointments()
    {
        return $this->belongsTo('App\ListAppointment', 'list_appointments_id');
    }

    public function pets()
    {
        return $this->belongsTo('App\Pet', 'pet_id');
    }
}
