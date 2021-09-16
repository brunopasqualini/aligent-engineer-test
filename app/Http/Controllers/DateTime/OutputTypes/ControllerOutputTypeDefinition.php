<?php

namespace App\Http\Controllers\DateTime\OutputTypes;

interface ControllerOutputTypeDefinition
{

    /**
     * Method to be impleted by child classes to convert the original calculation result into
     * their respective output such as HOURS, MINUTES, SECONDS or YEARS
     *
     * @param int $resultInSeconds
     * @return int
     */
    public function getOutputFromResultInSeconds(int $resultInSeconds): int;
}
