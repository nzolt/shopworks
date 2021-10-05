<?php

namespace App\Data\Models\Shifts;

use App\Exceptions\InvalidDateException;
use App\Helpers\DateHelper;
use App\Validators\ShiftValidator;

interface ShiftModelInterface
{
    /**
     * @return int
     */
    public function getStartedTimestamp(): int;

    /**
     * @return int
     */
    public function getEndedTimestamp(): int;

    /**
     * @return int
     */
    public function getWorkedMinutes(): int;

    /**
     * @return int
     */
    public function getDay(): int;

    /**
     * @return int
     */
    public function getWeekNo(): int;
}