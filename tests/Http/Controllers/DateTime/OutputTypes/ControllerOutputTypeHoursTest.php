<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeHours;

class ControllerOutputTypeHoursTest extends TestCase
{
    public function testZeroHours()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(0, $inst->getOutputFromResultInSeconds(3599));
    }

    public function testOneHour()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(1, $inst->getOutputFromResultInSeconds(3600));
    }

    public function testOneAndHalfHour()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(1, $inst->getOutputFromResultInSeconds(5400));
    }

    public function testTwoHours()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(2, $inst->getOutputFromResultInSeconds(7200));
    }

    public function testTenHours()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(10, $inst->getOutputFromResultInSeconds(36000));
    }

    public function testOneDay()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(24, $inst->getOutputFromResultInSeconds(86400));
    }

    public function test99Days()
    {
        $inst = new ControllerOutputTypeHours();
        $this->assertEquals(24 * 99, $inst->getOutputFromResultInSeconds(86400 * 99));
    }
}
