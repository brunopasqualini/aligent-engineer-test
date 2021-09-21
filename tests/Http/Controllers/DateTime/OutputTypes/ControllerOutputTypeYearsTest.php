<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeYears;

class ControllerOutputTypeYearsTest extends TestCase
{
    public function testZeroYears()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(0, $inst->getOutputFromResultInSeconds(31535999));
    }

    public function testOneYear()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(1, $inst->getOutputFromResultInSeconds(31536000));
    }

    public function testTwoYears()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(2, $inst->getOutputFromResultInSeconds(31536000 * 2));
    }

    public function testThreeYears()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(3, $inst->getOutputFromResultInSeconds(31536000 * 3));
    }

    public function testFiveYears()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(5, $inst->getOutputFromResultInSeconds(31536000 * 5));
    }

    public function testFiveAndHalfYears()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(5, $inst->getOutputFromResultInSeconds((31536000 * 5) + 31536000 / 2));
    }

    public function testTenYears()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(10, $inst->getOutputFromResultInSeconds(315360000));
    }

    public function test100Years()
    {
        $inst = new ControllerOutputTypeYears();
        $this->assertEquals(100, $inst->getOutputFromResultInSeconds(3153600000));
    }
}
