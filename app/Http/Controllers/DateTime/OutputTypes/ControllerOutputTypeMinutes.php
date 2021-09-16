<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

class ControllerOutputTypeMinutes implements ControllerOutputTypeDefinition
{
    public const MINUTE_IN_SECONDS = 60;

    /**
     * Convert the original calculation result into MINUTES
     *
     * @param int $resultInSeconds
     * @return int
     */
    public function getOutputFromResultInSeconds(int $resultInSeconds): int
    {
        return floor($resultInSeconds / self::MINUTE_IN_SECONDS);
    }
}
