<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use App\Http\Controllers\DateTime\DateTimeCalculationResultConverter as CalculationResultConverter;

class ControllerOutputTypeHours implements ControllerOutputTypeDefinition
{
    public const HOUR_IN_SECONDS = 3600;

    public function calculate(int $calculationResult, CalculationResultConverter $resultConverter): int
    {
        return floor($resultConverter->convertToSeconds($calculationResult) / self::HOUR_IN_SECONDS);
    }
}
