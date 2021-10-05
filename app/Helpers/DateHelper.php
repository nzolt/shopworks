<?php

namespace App\Helpers;

use DateTime;

class DateHelper
{
    public static function days_in_month($month, $year)
    {
        // calculate number of days in a month
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    /**
     * ISO-8601 numeric representation of the day of the week
     * @param \DateTime $date
     * @return int
     */
    public static function getDayOfWeek(\DateTime $date): int
    {
        return $date->format('N');
    }

    /**
     * ISO-8601 week number of year, weeks starting on Monday
     * @param \DateTime $date
     * @return int
     */
    public static function getWeek(\DateTime $date): int
    {
        return $date->format('W');
    }

    /**
     * @param DateTime $started
     * @param DateTime $ended
     * @return int
     */
    public static function getIntervalMinutes(\DateTime $started, \DateTime $ended): int
    {
        return ($ended->getTimestamp() - $started->getTimestamp()) / 60;
    }
}