<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use App\Http\Controllers\DateTime\DateTimeCalculationResultConverter as CalculationResultConverter;

class ControllerOutputTypeMinutes implements ControllerOutputTypeDefinition
{
    public const MINUTE_IN_SECONDS = 60;

    public function calculate(int $calculationResult, CalculationResultConverter $resultConverter): int
    {
        return floor($resultConverter->convertToSeconds($calculationResult) / self::MINUTE_IN_SECONDS);
    }
}
