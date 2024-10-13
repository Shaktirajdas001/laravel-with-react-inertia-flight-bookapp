<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;
    public $table = 'flight_booking';
    protected $fillable = [
        'flight_name',
        'take_of_location',
        'landing_loaction',
        'take_of_time',
        'landing_time',
        'landing_date',
        'created_by',
        'updated_by',
        'booking_days_id',
        'booking_day',
    ];
}
