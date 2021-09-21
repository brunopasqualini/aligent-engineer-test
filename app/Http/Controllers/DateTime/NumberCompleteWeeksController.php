<?php

namespace App\Http\Controllers\DateTime;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NumberCompleteWeeksController extends DateTimeControllerBase
{
    /**
     * Calculate and return the number of complete weeks between the date parameters
     *
     * @param Request $request
     * @param Carbon $dateOne
     * @param Carbon $dateTwo
     * @return int
     */
    protected function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int
    {
        return $dateTwo->diffInWeeks($dateOne);
    }

    /**
     * Convert the number of complete week into seconds
     *
     * @param int $resultFromCalculation
     * @return int
     */
    public function convertResultIntoSeconds(int $resultFromCalculation): int
    {
        return $resultFromCalculation * 7 * NumberDaysController::DAY_IN_SECONDS;
    }
}
