<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeSeconds;

class ControllerOutputTypeSecondsTest extends TestCase
{
    public function testZeroSeconds()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(0, $inst->getOutputFromResultInSeconds(0));
    }

    public function testOneSecond()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(1, $inst->getOutputFromResultInSeconds(1));
    }

    public function testThreeSeconds()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(3, $inst->getOutputFromResultInSeconds(3));
    }

    public function testOneMinute()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(60, $inst->getOutputFromResultInSeconds(60));
    }

    public function testOneAndHalfMinute()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(90, $inst->getOutputFromResultInSeconds(90));
    }

    public function testOneHour()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(3600, $inst->getOutputFromResultInSeconds(60 * 60));
    }

    public function testFiveHours()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(3600 * 5, $inst->getOutputFromResultInSeconds(60 * 60 * 5));
    }

    public function testOneDay()
    {
        $inst = new ControllerOutputTypeSeconds();
        $this->assertEquals(3600 * 24, $inst->getOutputFromResultInSeconds(60 * 60 * 24));
    }
}
