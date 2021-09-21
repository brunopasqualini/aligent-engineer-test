<?php

namespace App\Http\Controllers\DateTime;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Exceptions\Exception as CarbonExceptionBase;

abstract class DateTimeControllerBase extends Controller
{
    /**
     * API expected Date Time format - Y-m-d\TH:i:sP
     * ATOM is an enhanced version of ISO8601 for PHP
     */
    private const EXPECTED_DATE_TIME_FORMAT = \DateTime::ATOM;

    /**
     * Method that validates the data/fields received from the API call.
     * The validation basically checks whether the data provided in each
     * expected field is valid and if the required fields are present in
     * the request
     */
    private function validateApiFields()
    {
        $dateValidationRule = [
            'required',
            function ($attribute, $value, $fail) {
                try {
                    Carbon::createFromFormat(self::EXPECTED_DATE_TIME_FORMAT, $value);
                } catch (CarbonExceptionBase $th) {
                    $fail(
                        'The field ' . $attribute . ' is invalid.' .
                            'The expected date time format is: ' . self::EXPECTED_DATE_TIME_FORMAT
                    );
                }
            }
        ];
        $this->validate(request(), [
            'date_time.start' => $dateValidationRule,
            'date_time.end'   => $dateValidationRule,
            'timezone'        => 'timezone',
            'output_type'     => Rule::in(ControllerOutputFactory::getOutputTypesAsArray())
        ], [
            'date_time.start.required' => 'The start date field is required',
            'date_time.end.required'   => 'The end date field is required',
        ]);
    }

    /**
     * Process the API call
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // validate the API request fields/data
        $this->validateApiFields($request);

        // instantiate the date time objects based on the data from the request
        $startDate = Carbon::createFromFormat(
            self::EXPECTED_DATE_TIME_FORMAT,
            request('date_time.start')
        );
        $endDate = Carbon::createFromFormat(
            self::EXPECTED_DATE_TIME_FORMAT,
            request('date_time.end')
        );

        // calculate the difference between the dates provided in the request
        $result = $this->calculate(
            $request,
            $this->handleRequestTimezoneField($startDate),
            $this->handleRequestTimezoneField($endDate)
        );

        // return the result to the client
        return [
            'result' => $this->handleCalculationResult($result)
        ];
    }

    /**
     * Method to be implemented by child classes to do their own calculation
     * based on the date time parameters provided
     *
     * @param Request $request
     * @param Carbon $dateOne
     * @param Carbon $dateTwo
     * @return int
     */
    protected abstract function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int;

    /**
     * Method to be implemented by child classes to convert the result derived
     * from the calculation method (eg. the number of days between to two dates)
     * into seconds
     *
     * @param int $resultFromCalculation
     * @return int
     */
    protected abstract function convertResultIntoSeconds(int $resultFromCalculation): int;

    /**
     * Sets the timezone of the date to the one specified in the API request
     *
     * @param Carbon $date
     * @return Carbon
     */
    private function handleRequestTimezoneField(Carbon $date): Carbon
    {
        if (!isset(request()->timezone)) {
            return $date;
        }
        return $date->timezone(request()->timezone);
    }

    /**
     * Transform the original calculation result into a specific output
     * such as HOURS, MINUTES, SECONDS or YEARS
     *
     * @param int $calculationResult
     * @return int
     */
    protected final function handleCalculationResult(int $calculationResult): int
    {
        if (!isset(request()->output_type) || trim(request()->output_type . '') == '') {
            return $calculationResult;
        }
        return ControllerOutputFactory::createFromType(
            request()->output_type
        )->getOutputFromResultInSeconds($this->convertResultIntoSeconds($calculationResult));
    }
}
