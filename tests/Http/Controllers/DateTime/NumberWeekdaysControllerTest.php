<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory as OutputType;

require_once('DateTimeControllerTestBase.php');

class NumberWeekdaysControllerTest extends DateTimeControllerTestBase
{
    protected function getEndpointPath(): string
    {
        return 'weekdays';
    }

    public function testZeroWeekdays()
    {
        $this
            ->startDate("2021-09-25T03:23:54Z")
            ->endDate("2021-09-26T23:59:59Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testZeroWeekdaysInSeconds()
    {
        $this
            ->startDate("2021-09-25T03:23:54Z")
            ->endDate("2021-09-26T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testZeroWeekdaysInMinutes()
    {
        $this
            ->startDate("2021-09-25T03:23:54Z")
            ->endDate("2021-09-26T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testZeroWeekdaysInHours()
    {
        $this
            ->startDate("2021-09-25T03:23:54Z")
            ->endDate("2021-09-26T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testZeroWeekdaysInYears()
    {
        $this
            ->startDate("2021-09-25T03:23:54Z")
            ->endDate("2021-09-26T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testThreeWeekdays()
    {
        $this
            ->startDate("2021-09-24T03:02:44Z")
            ->endDate("2021-09-28T20:34:01Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(3, $response['result']);
    }

    public function testThreeWeekdaysInSeconds()
    {
        $this
            ->startDate("2021-09-24T03:02:44Z")
            ->endDate("2021-09-28T20:34:01Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(3 * 86400, $response['result']);
    }

    public function testThreeWeekdaysInMinutes()
    {
        $this
            ->startDate("2021-09-24T03:02:44Z")
            ->endDate("2021-09-28T20:34:01Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(3 * 1440, $response['result']);
    }

    public function testThreeWeekdaysInHours()
    {
        $this
            ->startDate("2021-09-24T03:02:44Z")
            ->endDate("2021-09-28T20:34:01Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(3 * 24, $response['result']);
    }

    public function testThreeWeekdaysInYears()
    {
        $this
            ->startDate("2021-09-24T03:02:44Z")
            ->endDate("2021-09-28T20:34:01Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testWeekdaysAgainstAMonth()
    {
        $this
            ->startDate("2021-09-01T00:00:00Z")
            ->endDate("2021-09-30T00:00:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(21, $response['result']);
    }

    public function testWeekdaysAgainstAMonthInSeconds()
    {
        $this
            ->startDate("2021-09-01T00:00:00Z")
            ->endDate("2021-09-30T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(21 * 86400, $response['result']);
    }

    public function testWeekdaysAgainstAMonthInMinutes()
    {
        $this
            ->startDate("2021-09-01T00:00:00Z")
            ->endDate("2021-09-30T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(21 * 1440, $response['result']);
    }

    public function testWeekdaysAgainstAMonthInHours()
    {
        $this
            ->startDate("2021-09-01T00:00:00Z")
            ->endDate("2021-09-30T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(21 * 24, $response['result']);
    }

    public function testWeekdaysAgainstAMonthInYears()
    {
        $this
            ->startDate("2021-09-01T00:00:00Z")
            ->endDate("2021-09-30T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testWeekdaysAgainstAYear()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2021-12-31T00:00:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(260, $response['result']);
    }

    public function testWeekdaysAgainstAYearInSeconds()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2021-12-31T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(260 * 86400, $response['result']);
    }

    public function testWeekdaysAgainstAYearInMinutes()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2021-12-31T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(260 * 1440, $response['result']);
    }

    public function testWeekdaysAgainstAYearInHours()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2021-12-31T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(260 * 24, $response['result']);
    }

    public function testWeekdaysAgainstAYearInYears()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2021-12-31T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test365Weekdays()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2022-05-27T00:00:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365, $response['result']);
    }

    public function test365WeekdaysInSeconds()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2022-05-27T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365 * 86400, $response['result']);
    }

    public function test365WeekdaysInMinutes()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2022-05-27T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365 * 1440, $response['result']);
    }

    public function test365WeekdaysInHours()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2022-05-27T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365 * 24, $response['result']);
    }

    public function test365WeekdaysInYears()
    {
        $this
            ->startDate("2021-01-01T00:00:00Z")
            ->endDate("2022-05-27T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function test821WeekdaysDifferenceBermudaTimeAgainstLongyearbyenTimeBasedHonoluluTime()
    {
        $this
            ->startDate("2021-01-01T00:00:00 Atlantic/Bermuda")
            ->endDate("2024-02-24T00:00:00 Arctic/Longyearbyen")
            ->timezone('Pacific/Honolulu')
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(821, $response['result']);
    }

    public function test821WeekdaysDifferenceBermudaTimeAgainstLongyearbyenTimeBasedHonoluluTimeInSeconds()
    {
        $this
            ->startDate("2021-01-01T00:00:00 Atlantic/Bermuda")
            ->endDate("2024-02-24T00:00:00 Arctic/Longyearbyen")
            ->timezone('Pacific/Honolulu')
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(821 * 86400, $response['result']);
    }

    public function test821WeekdaysDifferenceBermudaTimeAgainstLongyearbyenTimeBasedHonoluluTimeInMinutes()
    {
        $this
            ->startDate("2021-01-01T00:00:00 Atlantic/Bermuda")
            ->endDate("2024-02-24T00:00:00 Arctic/Longyearbyen")
            ->timezone('Pacific/Honolulu')
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(821 * 1440, $response['result']);
    }

    public function test821WeekdaysDifferenceBermudaTimeAgainstLongyearbyenTimeBasedHonoluluTimeInHours()
    {
        $this
            ->startDate("2021-01-01T00:00:00 Atlantic/Bermuda")
            ->endDate("2024-02-24T00:00:00 Arctic/Longyearbyen")
            ->timezone('Pacific/Honolulu')
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(821 * 24, $response['result']);
    }

    public function test821WeekdaysDifferenceBermudaTimeAgainstLongyearbyenTimeBasedHonoluluTimeInYears()
    {
        $this
            ->startDate("2021-01-01T00:00:00 Atlantic/Bermuda")
            ->endDate("2024-02-24T00:00:00 Arctic/Longyearbyen")
            ->timezone('Pacific/Honolulu')
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(2, $response['result']);
    }
}
