<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory as OutputType;

abstract class DateTimeControllerTestBase extends TestCase
{
    private string $startDate;
    private string $endDate;
    private ?string $outputType = null;
    private ?string $timezone = null;

    protected abstract function getEndpointPath(): string;

    protected function callApi()
    {
        $callParams = [
            'date_time' => [
                'start' => $this->startDate,
                'end'   => $this->endDate
            ]
        ];
        if ($this->outputType !== null) {
            $callParams['output_type'] = $this->outputType;
        }
        if ($this->timezone !== null) {
            $callParams['timezone'] = $this->timezone;
        }
        $this->post(
            "/datetime/" . $this->getEndpointPath(),
            $callParams
        );

        $this->resetData();
    }

    protected final function startDate(string $startDate): DateTimeControllerTestBase
    {
        $this->startDate = $startDate;
        return $this;
    }

    protected final function endDate(string $endDate): DateTimeControllerTestBase
    {
        $this->endDate = $endDate;
        return $this;
    }

    protected final function outputType(?string $outputType): DateTimeControllerTestBase
    {
        $this->outputType = $outputType;
        return $this;
    }

    protected final function timezone(?string $timezone): DateTimeControllerTestBase
    {
        $this->timezone = $timezone;
        return $this;
    }

    protected final function resetData()
    {
        $this
            ->startDate('')
            ->endDate('')
            ->outputType(null)
            ->timezone(null);
    }

    public function testInvalidDate()
    {
        $invalidStartDateMsg = "The field date_time.start is invalid.The expected date time format is: Y-m-d\TH:i:sP";
        $invalidEndDateMsg = "The field date_time.end is invalid.The expected date time format is: Y-m-d\TH:i:sP";

        $this
            ->startDate("2021-09-16F00:00:00Z")
            ->endDate("2021-09-16T23:59:592")
            ->callApi();

        $response = $this->response->json();

        $this->assertEquals($invalidStartDateMsg, $response['date_time.start'][0]);
        $this->assertEquals($invalidEndDateMsg, $response['date_time.end'][0]);

        $this
            ->startDate("xxx")
            ->endDate("1234324")
            ->callApi();

        $response = $this->response->json();

        $this->assertEquals($invalidStartDateMsg, $response['date_time.start'][0]);
        $this->assertEquals($invalidEndDateMsg, $response['date_time.end'][0]);


        $this
            ->startDate("2021-09-16F00:00:00Z")
            ->endDate("2021-09-16T23:59:59Z")
            ->callApi();

        $response = $this->response->json();

        // test an invalid start date
        $this->assertEquals($invalidStartDateMsg, $response['date_time.start'][0]);
        $this->assertTrue(!isset($response['date_time.end']));

        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-16T23:59:59")
            ->callApi();

        $response = $this->response->json();

        // test an invalid end date
        $this->assertEquals($invalidEndDateMsg, $response['date_time.end'][0]);
        $this->assertTrue(!isset($response['date_time.start']));
    }

    public function testTimezoneAvailable()
    {
        $this
            ->startDate("2021-09-21T03:00:00Z")
            ->endDate("2021-09-21T15:59:59Z")
            ->timezone('NonExistent/Timezone')
            ->callApi();

        $response = $this->response->json();

        // test an invalid timezone
        $invalidTimezoneMsg = "The timezone must be a valid zone.";
        $this->assertEquals($invalidTimezoneMsg, $response['timezone'][0]);

        $this
            ->startDate("2021-09-21T03:00:00Z")
            ->endDate("2021-09-21T15:59:59Z")
            ->timezone('Arctic/Longyearbyen')
            ->callApi();

        $response = $this->response->json();

        // test a valid timezone
        $this->assertTrue(!isset($response['timezone']));
    }

    public function testOutputTypesOptions()
    {
        $this
            ->startDate("2021-09-19T00:00:00Z")
            ->endDate("2021-09-21T13:23:34Z")
            ->outputType('INVALID_TYPE')
            ->callApi();

        $invalidOutputType = "The selected output type is invalid.";

        // test an invalid output type
        $response = $this->response->json();
        $this->assertEquals($invalidOutputType, $response['output_type'][0]);

        $this
            ->startDate("2021-09-19T00:00:00Z")
            ->endDate("2021-09-21T21:01:03Z")
            ->outputType('     ')
            ->callApi();

        // test a string with whitespace
        $response = $this->response->json();
        $this->assertTrue(!isset($response['output_type']));

        // test valid output types
        $types = array_unique(
            array_merge([
                OutputType::OUTPUT_TYPE_SECONDS,
                OutputType::OUTPUT_TYPE_MINUTES,
                OutputType::OUTPUT_TYPE_HOURS,
                OutputType::OUTPUT_TYPE_YEARS,
            ], OutputType::getOutputTypesAsArray())
        );
        foreach ($types as $type) {
            $this
                ->startDate("2021-09-19T00:00:00Z")
                ->endDate("2021-09-21T13:23:34Z")
                ->outputType($type)
                ->callApi();

            $response = $this->response->json();
            $this->assertTrue(!isset($response['output_type']));
        }
    }
}
