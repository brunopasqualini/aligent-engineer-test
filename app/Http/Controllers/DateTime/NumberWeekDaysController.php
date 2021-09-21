<?php

namespace App\Http\Controllers\DateTime;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NumberWeekdaysController extends DateTimeControllerBase
{

    /**
     * Calculate and return the number of weekdays between the date parameters
     *
     * @param Request $request
     * @param Carbon $dateOne
     * @param Carbon $dateTwo
     * @return int
     */
    protected function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int
    {
        return $dateTwo->diffInWeekdays($dateOne);
    }

    /**
     * Convert the number of weekdays into seconds
     *
     * @param int $resultFromCalculation
     * @return int
     */
    public function convertResultIntoSeconds(int $resultFromCalculation): int
    {
        return $resultFromCalculation * NumberDaysController::DAY_IN_SECONDS;
    }
}
