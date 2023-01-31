<?php

namespace App\helper;

class FreeSeatsHelper
{

    public function DropDownColour($venue)
    {
        if ($venue->free_seats >= (0.2 * $venue->capacity)) {
            return "#32cd32";
        } elseif ($venue->free_seats >= (0.1 * $venue->capacity)) {
            return "#FF8A33";
        } else {
            return "#FF3333";
        }
    }
}
