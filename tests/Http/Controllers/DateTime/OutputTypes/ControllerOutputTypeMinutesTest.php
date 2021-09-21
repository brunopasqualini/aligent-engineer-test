<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeMinutes;

class ControllerOutputTypeMinutesTest extends TestCase
{
    public function testZeroMinutes()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(0, $inst->getOutputFromResultInSeconds(34));
    }

    public function testOneMinute()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(1, $inst->getOutputFromResultInSeconds(60));
    }

    public function testOneAndHalfMinute()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(1, $inst->getOutputFromResultInSeconds(90));
    }

    public function testTwoMinutes()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(2, $inst->getOutputFromResultInSeconds(120));
    }

    public function testOneHour()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(60, $inst->getOutputFromResultInSeconds(3600));
    }

    public function testOneAndHalfHour()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(90, $inst->getOutputFromResultInSeconds(5400));
    }

    public function testOneDay()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(1440, $inst->getOutputFromResultInSeconds(86400));
    }

    public function test99Days()
    {
        $inst = new ControllerOutputTypeMinutes();
        $this->assertEquals(1440 * 99, $inst->getOutputFromResultInSeconds(86400 * 99));
    }
}
