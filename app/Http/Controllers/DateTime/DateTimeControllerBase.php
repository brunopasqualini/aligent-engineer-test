<?php

namespace App\Http\Controllers\DateTime;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DateTime\OutputTypes\ControllerOutputFactory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Exceptions\Exception as CarbonExceptionBase;

abstract class DateTimeControllerBase extends Controller implements DateTimeCalculationResultConverter
{
    private const EXPECTED_DATE_TIME_FORMAT = \DateTime::ATOM;

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
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validateApiFields($request);

        $startDate = Carbon::createFromFormat(
            self::EXPECTED_DATE_TIME_FORMAT,
            request('date_time.start')
        );
        $endDate = Carbon::createFromFormat(
            self::EXPECTED_DATE_TIME_FORMAT,
            request('date_time.end')
        );

        $result = $this->calculate(
            $request,
            $this->handleRequestTimezoneField($startDate),
            $this->handleRequestTimezoneField($endDate)
        );

        return [
            'result' => $this->handleCalculationResult($result)
        ];
    }

    private function handleRequestTimezoneField(Carbon $date): Carbon
    {
        if (!isset(request()->timezone)) {
            return $date;
        }
        return $date->timezone(request()->timezone);
    }

    /**
     * Method to be implemented by child classes to do their own calculation based on the date time parameters provided
     *
     * @return int
     */
    protected abstract function calculate(Request $request, Carbon $dateOne, Carbon $dateTwo): int;

    protected final function handleCalculationResult(int $result): int
    {
        if (!isset(request()->output_type)) {
            return $result;
        }
        return ControllerOutputFactory::createFromType(request()->output_type)->calculate($result, $this);
    }
}
