<?php

namespace App\Http\Controllers\DateTime;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NumberDaysController extends DateTimeControllerBase
{
    public const DAY_IN_SECONDS = 86400;

    protected function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int
    {
        return $dateTwo->diffInDays($dateOne);
    }

    public function convertToSeconds(int $resultFromCalculation): int
    {
        return $resultFromCalculation * self::DAY_IN_SECONDS;
    }
}
