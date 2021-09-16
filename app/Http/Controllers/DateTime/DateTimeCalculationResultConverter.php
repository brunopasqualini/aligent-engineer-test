<?php

namespace App\Http\Controllers\DateTime;

interface DateTimeCalculationResultConverter
{
    public function convertToSeconds(int $resultFromCalculation): int;
}
