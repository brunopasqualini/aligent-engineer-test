<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use App\Http\Controllers\DateTime\DateTimeCalculationResultConverter as CalculationResultConverter;

class ControllerOutputTypeSeconds implements ControllerOutputTypeDefinition
{
    public function calculate(int $calculationResult, CalculationResultConverter $resultConverter): int
    {
        return $resultConverter->convertToSeconds($calculationResult);
    }
}
