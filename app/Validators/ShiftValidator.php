<?php

namespace App\Validators;

class ShiftValidator
{
    public static function ValidateShiftDates(\DateTime $start, \DateTime $end): bool
    {
        /**
         * Check if Start and End date are on the same day
         * One shift must contain data for one day.
         */
        if(
            $start->format('j') == $end->format('j') && // Check if Shift starts on the same day
            $start->format('W') == $end->format('W') // Check if Shift starts on the same week
            // Add year check if necessary.
        ){
            return true;
        }

        return false;
    }
}