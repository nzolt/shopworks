<?php

namespace App\Data\Models\Shifts;

use ArrayObject;

/** Class for reference only
 * Need to be replaced by FW specific Collection
 */
class ShiftCollection extends ArrayObject
{
    /**
     * @var array
     */
    protected $shifts = array();

    /**
     * @param array $shifts
     */
    public function __construct(array $shifts)
    {
        $this->shifts = $shifts;
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        return $this->shifts;
    }

    /**
     * @return array
     */
    public function getShifts(): array
    {
        return $this->shifts;
    }

    /**
     * Retrieve Shifts from DB when in Framework.
     */
    public function retrieveShifts(): void
    {
        // TODO: Implement retrieve Shifts from DB when in Framework.
        // $this->shifts = DB::Shifts();
    }

    /**
     * @param array $shifts
     */
    public function setShifts(array $shifts): void
    {
        $this->shifts = $shifts;
    }

}