<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    public $timestamps = true;
    protected $fillable = [
        'id', 'name', 'phone', 'email', 'id_courses', 'quantity', 'order_date', 'checkin_time',
        'private_room', 'fee', 'first_visit'
    ];
}
