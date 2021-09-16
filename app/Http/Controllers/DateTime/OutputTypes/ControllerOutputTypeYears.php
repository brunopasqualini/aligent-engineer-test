<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use App\Http\Controllers\DateTime\DateTimeCalculationResultConverter as CalculationResultConverter;

class ControllerOutputTypeYears implements ControllerOutputTypeDefinition
{
    public const YEAR_IN_SECONDS = 31536000;

    public function calculate(int $calculationResult, CalculationResultConverter $resultConverter): int
    {
        return floor($resultConverter->convertToSeconds($calculationResult) / self::YEAR_IN_SECONDS);
    }
}
