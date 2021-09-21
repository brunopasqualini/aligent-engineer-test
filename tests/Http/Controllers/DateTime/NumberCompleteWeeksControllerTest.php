<?php

use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory as OutputType;

require_once('DateTimeControllerTestBase.php');

class NumberCompleteWeeksControllerTest extends DateTimeControllerTestBase
{

    protected function getEndpointPath(): string
    {
        return 'completeweeks';
    }

    public function testIncompleteWeek()
    {
        $this
            ->startDate("2021-09-21T00:02:00Z")
            ->endDate("2021-09-27T23:00:30Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testIncompleteWeekInSeconds()
    {
        $this
            ->startDate("2021-09-21T00:02:00Z")
            ->endDate("2021-09-27T23:00:30Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testIncompleteWeekInMinutes()
    {
        $this
            ->startDate("2021-09-21T00:02:00Z")
            ->endDate("2021-09-27T23:00:30Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testIncompleteWeekInHours()
    {
        $this
            ->startDate("2021-09-21T00:02:00Z")
            ->endDate("2021-09-27T23:00:30Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testIncompleteWeekInYears()
    {
        $this
            ->startDate("2021-09-21T00:02:00Z")
            ->endDate("2021-09-27T23:00:30Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testOneCompleteWeek()
    {
        $this
            ->startDate("2021-09-22T13:02:34Z")
            ->endDate("2021-09-29T13:02:34Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function testOneCompleteWeekInSeconds()
    {
        $this
            ->startDate("2021-09-22T13:02:34Z")
            ->endDate("2021-09-29T13:02:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 86400, $response['result']);
    }

    public function testOneCompleteWeekInMinutes()
    {
        $this
            ->startDate("2021-09-22T13:02:34Z")
            ->endDate("2021-09-29T13:02:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 1440, $response['result']);
    }

    public function testOneCompleteWeekInHours()
    {
        $this
            ->startDate("2021-09-22T13:02:34Z")
            ->endDate("2021-09-29T13:02:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 24, $response['result']);
    }

    public function testOneCompleteWeekInYears()
    {
        $this
            ->startDate("2021-09-22T13:02:34Z")
            ->endDate("2021-09-29T13:02:34Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testFiveAndHalfWeeks()
    {
        $this
            ->startDate("2021-09-24T00:00:00Z")
            ->endDate("2021-11-03T06:37:54Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(5, $response['result']);
    }

    public function testFiveAndHalfWeeksInSeconds()
    {
        $this
            ->startDate("2021-09-24T00:00:00Z")
            ->endDate("2021-11-03T06:37:54Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 5 * 86400, $response['result']);
    }

    public function testFiveAndHalfWeeksInMinutes()
    {
        $this
            ->startDate("2021-09-24T00:00:00Z")
            ->endDate("2021-11-03T06:37:54Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 5 * 1440, $response['result']);
    }

    public function testFiveAndHalfWeeksInHours()
    {
        $this
            ->startDate("2021-09-24T00:00:00Z")
            ->endDate("2021-11-03T06:37:54Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(7 * 5 * 24, $response['result']);
    }

    public function testFiveAndHalfWeeksInYears()
    {
        $this
            ->startDate("2021-09-24T00:00:00Z")
            ->endDate("2021-11-03T06:37:54Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testFiftyTwoWeeks()
    {
        $this
            ->startDate("2021-09-24T00:01:00Z")
            ->endDate("2022-09-24T00:01:00Z")
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(52, $response['result']);
    }

    public function testFiftyTwoWeeksInSeconds()
    {
        $this
            ->startDate("2021-09-24T00:01:00Z")
            ->endDate("2022-09-24T00:01:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(52 * 7 * 86400, $response['result']);
    }

    public function testFiftyTwoWeeksInMinutes()
    {
        $this
            ->startDate("2021-09-24T00:01:00Z")
            ->endDate("2022-09-24T00:01:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(52 * 7 * 1440, $response['result']);
    }

    public function testFiftyTwoWeeksInHours()
    {
        $this
            ->startDate("2021-09-24T00:01:00Z")
            ->endDate("2022-09-24T00:01:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(52 * 7 * 24, $response['result']);
    }

    public function testFiftyTwoWeeksInYears()
    {
        $this
            ->startDate("2021-09-24T00:01:00Z")
            ->endDate("2022-09-24T00:01:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        // one year has 52 weeks and one or two days depending if it is a leap year, therefore 52 weeks is not a complete year
        $response = $this->response->json();
        $this->assertEquals(0, $response['result']);
    }

    public function testFiftyThreeWeeksInYears()
    {
        $this
            ->startDate("2021-09-24T00:01:00Z")
            ->endDate("2022-10-01T00:01:00Z")
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        // in this test there will be more than 364 days in 53 weeks, therefore it will a bit more than a year
        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }

    public function testSixtyWeeksDifferenceMaldivesTimeAgainstJohannesburgTimeBasedDubaiTime()
    {
        $this
            ->startDate("2021-03-15T00:01:00 Indian/Maldives")
            ->endDate("2022-05-14T00:01:00 Africa/Johannesburg")
            ->timezone('Asia/Dubai')
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(60, $response['result']);
    }

    public function testSixtyWeeksDifferenceMaldivesTimeAgainstJohannesburgTimeBasedDubaiTimeInSeconds()
    {
        $this
            ->startDate("2021-03-15T00:01:00 Indian/Maldives")
            ->endDate("2022-05-14T00:01:00 Africa/Johannesburg")
            ->timezone('Asia/Dubai')
            ->outputType(OutputType::OUTPUT_TYPE_SECONDS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(60 * 7 * 86400, $response['result']);
    }

    public function testSixtyWeeksDifferenceMaldivesTimeAgainstJohannesburgTimeBasedDubaiTimeInMinutes()
    {
        $this
            ->startDate("2021-03-15T00:01:00 Indian/Maldives")
            ->endDate("2022-05-14T00:01:00 Africa/Johannesburg")
            ->timezone('Asia/Dubai')
            ->outputType(OutputType::OUTPUT_TYPE_MINUTES)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(60 * 7 * 1440, $response['result']);
    }

    public function testSixtyWeeksDifferenceMaldivesTimeAgainstJohannesburgTimeBasedDubaiTimeInHours()
    {
        $this
            ->startDate("2021-03-15T00:01:00 Indian/Maldives")
            ->endDate("2022-05-14T00:01:00 Africa/Johannesburg")
            ->timezone('Asia/Dubai')
            ->outputType(OutputType::OUTPUT_TYPE_HOURS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(60 * 7 * 24, $response['result']);
    }

    public function testSixtyWeeksDifferenceMaldivesTimeAgainstJohannesburgTimeBasedDubaiTimeInYears()
    {
        $this
            ->startDate("2021-03-15T00:01:00 Indian/Maldives")
            ->endDate("2022-05-14T00:01:00 Africa/Johannesburg")
            ->timezone('Asia/Dubai')
            ->outputType(OutputType::OUTPUT_TYPE_YEARS)
            ->callApi();

        $response = $this->response->json();
        $this->assertEquals(1, $response['result']);
    }
}
