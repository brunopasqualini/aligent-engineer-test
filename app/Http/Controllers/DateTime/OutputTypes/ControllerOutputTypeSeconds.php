<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

class ControllerOutputTypeSeconds implements ControllerOutputTypeDefinition
{

    /**
     * Convert the original calculation result into SECONDS
     *
     * @param int $resultInSeconds
     * @return int
     */
    public function getOutputFromResultInSeconds(int $resultInSeconds): int
    {
        return $resultInSeconds;
    }
}
