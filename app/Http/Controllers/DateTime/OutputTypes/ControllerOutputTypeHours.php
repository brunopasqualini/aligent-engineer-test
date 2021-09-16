<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

class ControllerOutputTypeHours implements ControllerOutputTypeDefinition
{
    public const HOUR_IN_SECONDS = 3600;

    /**
     * Convert the original calculation result into HOURS
     *
     * @param int $resultInSeconds
     * @return int
     */
    public function getOutputFromResultInSeconds(int $resultInSeconds): int
    {
        return floor($resultInSeconds / self::HOUR_IN_SECONDS);
    }
}
