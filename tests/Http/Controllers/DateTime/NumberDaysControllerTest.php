<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory as OutputType;

require_once('DateTimeControllerTestBase.php');

class NumberDaysControllerTest extends DateTimeControllerTestBase
{

    protected function getEndpointPath(): string
    {
        return 'days';
    }

    public function test0DayDifference()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-16T23:59:59Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test0DayDifferenceInSeconds()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-16T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test0DayDifferenceInMinutes()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-16T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test0DayDifferenceInHours()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-16T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test0DayDifferenceInYears()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-16T23:59:59Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test1DayDifference()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-17T07:40:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function test1DayDifferenceInSeconds()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-17T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(86400, $response['result']);
    }

    public function test1DayDifferenceInMinutes()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-17T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1440, $response['result']);
    }

    public function test1DayDifferenceInHours()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-17T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(24, $response['result']);
    }

    public function test1DayDifferenceInYears()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-17T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test1DayDifferenceAgainstOneAndHalfDay()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-17T12:00:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function test1DayDifferenceAgainstOneAndHalfDayInSeconds()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-17T12:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(86400, $response['result']);
    }

    public function test1DayDifferenceAgainstOneAndHalfDayInMinutes()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-17T12:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1440, $response['result']);
    }

    public function test1DayDifferenceAgainstOneAndHalfDayInHours()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-17T12:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(24, $response['result']);
    }

    public function test1DayDifferenceAgainstOneAndHalfDayInYears()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-17T12:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test2DayDifference()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-18T07:40:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(2, $response['result']);
    }

    public function test2DayDifferenceInSeconds()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-18T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(2 * 86400, $response['result']);
    }

    public function test2DayDifferenceInMinutes()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-18T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(2 * 1440, $response['result']);
    }

    public function test2DayDifferenceInHours()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-18T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(2 * 24, $response['result']);
    }

    public function test2DayDifferenceInYears()
    {
        $this
            ->startDate("2021-09-16T07:40:00Z")
            ->endDate("2021-09-18T07:40:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test30DayDifferenceAgainstAMonth()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-10-16T00:00:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(30, $response['result']);
    }

    public function test30DayDifferenceAgainstAMonthInSeconds()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-10-16T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(30 * 86400, $response['result']);
    }

    public function test30DayDifferenceAgainstAMonthInMinutes()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-10-16T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(30 * 1440, $response['result']);
    }

    public function test30DayDifferenceAgainstAMonthInHours()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-10-16T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(30 * 24, $response['result']);
    }

    public function test30DayDifferenceAgainstAMonthInYears()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-10-16T00:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test7DayDifferenceAgainstAWeek()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-23T03:23:34Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7, $response['result']);
    }

    public function test7DayDifferenceAgainstAWeekInSeconds()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-23T03:23:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 86400, $response['result']);
    }

    public function test7DayDifferenceAgainstAWeekInMinutes()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-23T03:23:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 1440, $response['result']);
    }

    public function test7DayDifferenceAgainstAWeekInHours()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-23T03:23:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 24, $response['result']);
    }

    public function test7DayDifferenceAgainstAWeekInYears()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2021-09-23T03:23:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearAndOneDay()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2022-09-17T05:23:40Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(366, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearAndOneDayInSeconds()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2022-09-17T05:23:40Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(366 * 86400, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearAndOneDayInMinutes()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2022-09-17T05:23:40Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(366 * 1440, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearAndOneDayInHours()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2022-09-17T05:23:40Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(366 * 24, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearAndOneDayInYears()
    {
        $this
            ->startDate("2021-09-16T00:00:00Z")
            ->endDate("2022-09-17T05:23:40Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function test365DayDifferenceAgainstAYear()
    {
        $this
            ->startDate("2021-09-16T01:00:00Z")
            ->endDate("2022-09-16T01:00:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearInSeconds()
    {
        $this
            ->startDate("2021-09-16T01:00:00Z")
            ->endDate("2022-09-16T01:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365 * 86400, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearInMinutes()
    {
        $this
            ->startDate("2021-09-16T01:00:00Z")
            ->endDate("2022-09-16T01:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365 * 1440, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearInHours()
    {
        $this
            ->startDate("2021-09-16T01:00:00Z")
            ->endDate("2022-09-16T01:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(365 * 24, $response['result']);
    }

    public function test365DayDifferenceAgainstAYearInYears()
    {
        $this
            ->startDate("2021-09-16T01:00:00Z")
            ->endDate("2022-09-16T01:00:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function test1DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTime()
    {
        $this
            ->startDate("2021-09-16T02:00:00 America/Sao_Paulo")
            ->endDate("2021-09-17T14:30:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function test2DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTime()
    {
        $this
            ->startDate("2021-09-16T01:00:00 America/Sao_Paulo")
            ->endDate("2021-09-18T13:30:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(2, $response['result']);
    }

    public function test47DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTime()
    {
        $this
            ->startDate("2021-09-16T08:30:00 America/Sao_Paulo")
            ->endDate("2021-11-02T23:00:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(47, $response['result']);
    }

    public function test47DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTimeInSeconds()
    {
        $this
            ->startDate("2021-09-16T08:30:00 America/Sao_Paulo")
            ->endDate("2021-11-02T23:00:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(47 * 86400, $response['result']);
    }

    public function test47DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTimeInMinutes()
    {
        $this
            ->startDate("2021-09-16T08:30:00 America/Sao_Paulo")
            ->endDate("2021-11-02T23:00:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(47 * 1440, $response['result']);
    }

    public function test47DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTimeInHours()
    {
        $this
            ->startDate("2021-09-16T08:30:00 America/Sao_Paulo")
            ->endDate("2021-11-02T23:00:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(47 * 24, $response['result']);
    }

    public function test47DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTimeInYears()
    {
        $this
            ->startDate("2021-09-16T08:30:00 America/Sao_Paulo")
            ->endDate("2021-11-02T23:00:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function test365DayDifferenceSaoPauloTimeAgainstAdelaideTimeBasedLondonTimeInYears()
    {
        $this
            ->startDate("2021-09-16T08:30:00 America/Sao_Paulo")
            ->endDate("2022-09-17T21:00:00 Australia/Adelaide")
            ->timezone('Europe/London')
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }
}
