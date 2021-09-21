<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactoryException;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeHours;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeMinutes;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeSeconds;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputTypeYears;

class ControllerOutputFactoryTest extends TestCase
{
    public function testAvailableOutputTypes()
    {
        $ouputTypes = [
            ControllerOutputFactory::OUTPUT_TYPE_SECONDS,
            ControllerOutputFactory::OUTPUT_TYPE_MINUTES,
            ControllerOutputFactory::OUTPUT_TYPE_HOURS,
            ControllerOutputFactory::OUTPUT_TYPE_YEARS
        ];

        $typesDifference = array_diff(
            ControllerOutputFactory::getOutputTypesAsArray(),
            $ouputTypes
        );

        $this->assertTrue(sizeof($typesDifference) == 0);
    }

    public function testCreateFromTypeSeconds()
    {
        $instance = ControllerOutputFactory::createFromType(ControllerOutputFactory::OUTPUT_TYPE_SECONDS);
        $this->assertInstanceOf(ControllerOutputTypeSeconds::class, $instance);
    }

    public function testCreateFromTypeMinutes()
    {
        $instance = ControllerOutputFactory::createFromType(ControllerOutputFactory::OUTPUT_TYPE_MINUTES);
        $this->assertInstanceOf(ControllerOutputTypeMinutes::class, $instance);
    }

    public function testCreateFromTypeHours()
    {
        $instance = ControllerOutputFactory::createFromType(ControllerOutputFactory::OUTPUT_TYPE_HOURS);
        $this->assertInstanceOf(ControllerOutputTypeHours::class, $instance);
    }

    public function testCreateFromTypeYears()
    {
        $instance = ControllerOutputFactory::createFromType(ControllerOutputFactory::OUTPUT_TYPE_YEARS);
        $this->assertInstanceOf(ControllerOutputTypeYears::class, $instance);
    }

    public function testCreateFromTypeUnkown()
    {
        $exception = null;
        try {
            ControllerOutputFactory::createFromType('NOT A VALID TYPE');
        } catch (Exception $th) {
            $exception = $th;
        }
        $this->assertInstanceOf(ControllerOutputFactoryException::class, $exception);
    }
}
