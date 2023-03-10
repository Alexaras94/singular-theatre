<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{

    protected $fillable = [
        'location', 'venue_date', 'venue_time', 'capacity', 'status', 'free_seats',
    ];
    use HasFactory;

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
