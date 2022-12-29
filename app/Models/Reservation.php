<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'username', 'venue_id', 'email',  'company', 'number_of_seats',
    ];
    use HasFactory;
}