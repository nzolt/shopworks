<?php

namespace App\Service;

use App\Data\Models\Shifts\ShiftModel;

class SharedManning
{
    /**
     * @param array $dayShifts [ShiftModel]
     * @return array
     */
    public static function calculateManning(array $dayShifts): array
    {
        // Implement shared manning calculation on request.

        return [];
    }
}