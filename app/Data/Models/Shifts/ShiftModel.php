<?php

namespace App\Data\Models\Shifts;

use App\Exceptions\InvalidDateException;
use App\Helpers\DateHelper;
use App\Validators\ShiftValidator;

class ShiftModel extends ShiftModelAbstract
{
    /**
     * @return int
     */
    public function getStartedTimestamp(): int
    {
        return $this->startTime->getTimestamp();
    }

    /**
     * @return int
     */
    public function getEndedTimestamp(): int
    {
        return $this->endTime->getTimestamp();
    }

    /**
     * @return int
     */
    public function getWorkedMinutes(): int
    {
        return DateHelper::getIntervalMinutes($this->startTime, $this->endTime);
    }

    /**
     * @return int
     */
    public function getDayNumber(): int
    {
        return DateHelper::getDayOfWeek($this->getStartTime());
    }

    public function getWeekNumber(): int
    {
        return DateHelper::getWeek($this->getStartTime());
    }
}