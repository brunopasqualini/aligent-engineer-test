<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use App\Http\Controllers\DateTime\DateTimeCalculationResultConverter as CalculationResultConverter;

interface ControllerOutputTypeDefinition
{
    public function calculate(int $calculationResult, CalculationResultConverter $resultConverter): int;
}
