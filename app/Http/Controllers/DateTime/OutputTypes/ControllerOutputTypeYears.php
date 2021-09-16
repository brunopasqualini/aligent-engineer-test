<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

class ControllerOutputTypeYears implements ControllerOutputTypeDefinition
{
    public const YEAR_IN_SECONDS = 31536000;

    /**
     * Convert the original calculation result into YEARS
     *
     * @param int $resultInSeconds
     * @return int
     */
    public function getOutputFromResultInSeconds(int $resultInSeconds): int
    {
        return floor($resultInSeconds / self::YEAR_IN_SECONDS);
    }
}
