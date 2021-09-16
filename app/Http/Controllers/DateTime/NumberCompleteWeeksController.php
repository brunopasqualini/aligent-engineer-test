<?php

namespace App\Http\Controllers\DateTime;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NumberCompleteWeeksController extends DateTimeControllerBase
{
    public const WEEK_IN_SECONDS = 604800;

    protected function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int
    {
        return $dateTwo->diffInWeeks($dateOne);
    }

    public function convertToSeconds(int $resultFromCalculation): int
    {
        return $resultFromCalculation * self::WEEK_IN_SECONDS;
    }
}
