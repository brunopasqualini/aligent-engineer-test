<?php

namespace App\Http\Controllers\DateTime;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NumberDaysController extends DateTimeControllerBase
{
    public const DAY_IN_SECONDS = 86400;

    /**
     * Calculate and return the number of days between the date parameters
     *
     * @param Request $request
     * @param Carbon $dateOne
     * @param Carbon $dateTwo
     * @return int
     */
    protected function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int
    {
        return $dateTwo->diffInDays($dateOne);
    }

    /**
     * Convert the number of days into seconds
     *
     * @param int $resultFromCalculation
     * @return int
     */
    public function convertResultIntoSeconds(int $resultFromCalculation): int
    {
        return $resultFromCalculation * self::DAY_IN_SECONDS;
    }
}
