<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

use App\Http\Controllers\DateTime\DateTimeCalculationResultConverter as CalculationResultConverter;

final class ControllerOutputFactory
{
    public const OUTPUT_TYPE_SECONDS = 'SECONDS';
    public const OUTPUT_TYPE_MINUTES = 'MINUTES';
    public const OUTPUT_TYPE_HOURS   = 'HOURS';
    public const OUTPUT_TYPE_YEARS   = 'YEARS';

    public static function getOutputTypesAsArray(): array
    {
        return [
            self::OUTPUT_TYPE_SECONDS,
            self::OUTPUT_TYPE_MINUTES,
            self::OUTPUT_TYPE_HOURS,
            self::OUTPUT_TYPE_YEARS
        ];
    }

    public static function createFromType(string $outputType): ControllerOutputTypeDefinition
    {
        $instance = self::createInstanceFromType($outputType);
        return $instance;
    }

    private static function createInstanceFromType(string $outputType): ControllerOutputTypeDefinition
    {
        switch ($outputType) {
            case self::OUTPUT_TYPE_SECONDS:
                return new ControllerOutputTypeSeconds();

            case self::OUTPUT_TYPE_MINUTES:
                return new ControllerOutputTypeMinutes();

            case self::OUTPUT_TYPE_HOURS:
                return new ControllerOutputTypeHours();

            case self::OUTPUT_TYPE_YEARS:
                return new ControllerOutputTypeYears();

            default:
                return self::getDefaultOutputTypeInstance();
        }
    }

    private static function getDefaultOutputTypeInstance(): ControllerOutputTypeDefinition
    {
        return new class() implements ControllerOutputTypeDefinition
        {
            public function calculate(int $calculationResult, CalculationResultConverter $resultConverter): int
            {
                return $calculationResult;
            }
        };
    }
}
