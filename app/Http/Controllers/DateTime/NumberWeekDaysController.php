<?php

namespace App\Http\Controllers\DateTime;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NumberWeekDaysController extends DateTimeControllerBase
{
    protected function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int
    {
        return $dateTwo->diffInWeekdays($dateOne);
    }

    public function convertToSeconds(int $resultFromCalculation): int
    {
        return $resultFromCalculation * NumberDaysController::DAY_IN_SECONDS;
    }
}
