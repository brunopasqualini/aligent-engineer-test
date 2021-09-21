<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

final class ControllerOutputFactory
{
    public const OUTPUT_TYPE_SECONDS = 'SECONDS';
    public const OUTPUT_TYPE_MINUTES = 'MINUTES';
    public const OUTPUT_TYPE_HOURS   = 'HOURS';
    public const OUTPUT_TYPE_YEARS   = 'YEARS';

    /**
     * Return an array with the available output type options
     *
     * @return array
     */
    public static function getOutputTypesAsArray(): array
    {
        return [
            self::OUTPUT_TYPE_SECONDS,
            self::OUTPUT_TYPE_MINUTES,
            self::OUTPUT_TYPE_HOURS,
            self::OUTPUT_TYPE_YEARS
        ];
    }

    /**
     * Create the corresponding ControllerOutputTypeDefinition instance based on the output type provided
     *
     * @param string $outputType
     * @return ControllerOutputTypeDefinition
     */
    public static function createFromType(string $outputType): ControllerOutputTypeDefinition
    {
        return self::createInstanceFromType($outputType);
    }

    /**
     * Create the corresponding ControllerOutputTypeDefinition instance based on the output type provided
     *
     * @param string $outputType
     * @return ControllerOutputTypeDefinition
     */
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
                throw new ControllerOutputFactoryException();
        }
    }
}
