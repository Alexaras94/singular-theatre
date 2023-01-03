<?php

namespace App\helper;

class FreeSeatsHelper
{

    public function DropDownColour($venue)
    {
        if ($venue->free_seats >= (0.3 * $venue->capacity)){
            return "#32cd32";

        }
        elseif ($venue->free_seats <= (0.3 * $venue->capacity)){
            return "#FF8A33 ";

            }
        else {
            return "#FF3333 ";
        }

    }

}
