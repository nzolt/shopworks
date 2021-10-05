<?php

namespace App\Data\Models\Rotas;

use App\Data\Models\Shifts\ShiftCollection;

interface RotasInterface
{
    /**
     * @return array
     */
    public function getShifts(): array;

    /**
     * @param ShiftCollection $shifts
     */
    public function setShifts(ShiftCollection $shifts): void;

    /**
     * @return int
     */
    public function getWeek(): int;
}