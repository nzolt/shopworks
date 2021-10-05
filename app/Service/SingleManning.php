<?php

namespace App\Service;

use App\Helpers\DateHelper;

class SingleManning
{
    /**
     * @param array $dayShifts [ShiftModel]
     * @return array
     */
    public static function calculateManning(array $dayShifts): array
    {
        $worked = [];

        // One entry/person in shift, all shift is Single manning
        if(count($dayShifts) == 1){
            return [
                current($dayShifts)->getStaffId() =>
                    DateHelper::getIntervalMinutes(
                        current($dayShifts)->getStartTime(),
                        current($dayShifts)->getEndTime()
                    )
            ];
        } else {
            foreach ($dayShifts as $dayShift){ # Create array
                $todayShifts[$dayShift->getStaffId()] = ['start' => $dayShift->getStartTime(), 'end' => $dayShift->getEndTime()];
            }
            uasort($todayShifts,
                function ($a, $b) {
                    return $a['start']->getTimestamp() - $b['start']->getTimestamp();
                }
            ); # Order ascending by start time
            $keys = array_keys($todayShifts); # Get keys
            $currentKey = $keys[0]; # Get current key
            $currentTime = current($todayShifts); # Get first start
            $nextKey = $keys[1]; # Get second key
            $nextTime = next($todayShifts); # Get second start

            $currentStart = $currentTime['start']->getTimestamp();
            $currentEnd = $currentTime['end']->getTimestamp();
            $nextStart = $nextTime['start']->getTimestamp();
            $nextEnd = $nextTime['end']->getTimestamp();

            if($nextStart > $currentEnd - 1){ # No overlap on employees (Get 1 sec to avoid same timestamp start-end error)
                return [$currentKey => ($currentEnd - $currentStart) / 60, # Employee 1 bonus minutes
                    $nextKey => ($nextEnd - $nextStart) / 60 # Employee 2 bonus minutes
                ];
            } else { # Overlap on employees
                return [$currentKey => ($nextStart - $currentStart) / 60, # Employee 1 bonus minutes
                    $nextKey => ($nextEnd - $currentEnd) / 60 # Employee 2 bonus minutes
                    ];
            }
        }
    }
}