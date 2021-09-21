# Aligent Programming Task

The requiremens of this task have been implemented using Lumen Framework. Lumen is a micro-framework based on Laravel. The official documentation of Lumen can be found [here](https://lumen.laravel.com/docs).
## Server requirements

The [official documentation](https://lumen.laravel.com/docs/8.x/installation) recommends to use [Laravel Homestead](http://laravel.com/docs/homestead) as the development environment to run Lumen Projects, however, it is also possible to set up a different server as long as it has the following requirements:

- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- [Composer](http://getcomposer.org/)

## Running the application

This application has been initially tested on a Windows environment using PHP 7.4.9 and Apache Apache/2.4.43 (Win64) but it is also possible to serve the project using PHP's built-in web server by using the following command line on the main directory of the project:

```sh
php -S localhost:8000 -t public
```

## API & Endpoints

In order to meet the requirements of this challenge, three different endpoints have been created. The following sections will be describing each of these endpoints and their respective functionalities.

##### 1. Number of days between two dates

This endpoint calculates the number of days between two datetime parameters.
| Absolute URL  | Endpoint | Type |
| ------------- | ------------- | ------------- |
| http://localhost:8000/datetime  | /days  | POST

##### 2. Number of weekdays between two dates

This endpoint calculates the number of weekdays between two datetime parameters.
| Absolute URL  | Endpoint | Type |
| ------------- | ------------- | ------------- |
| http://localhost:8000/datetime  | /weekdays  | POST

##### 3. Number of complete weeks between two dates

This endpoint calculates the number of complete weeks between two datetime parameters.
| Absolute URL  | Endpoint | Type |
| ------------- | ------------- | ------------- |
| http://localhost:8000/datetime  | /completeweeks  | POST

## API Endpoint - Parameters & Responses
All endpoints expect the same input parameters, although they return different information from one another. Below are the explanation of the parameters that can be sent in the HTTP requests to the endpoints.

##### > *date_time* parameter
The *date_time* property and its inner object are mandatory fields and therefore no requests will be processed without them.

> **Date format expected**: Y-m-d\TH:i:sP - [ATOM](https://www.php.net/manual/en/class.datetimeinterface.php#datetime.constants.atom)
[DateTime::ATOM vs DateTime::ISO8601](https://www.designcise.com/web/tutorial/whats-the-difference-between-php-datetime-atom-and-datetime-iso8601)

***Request Body***

```javascript
{
    "date_time": {
        "start": "2021-09-16T07:40:00Z",
        "end": "2022-09-16T07:40:00Z"
    }
}
```
*Example response using the [**/days**](#1-number-of-days-between-two-dates) endpoint*

```javascript
{
    "result": 365
}
```
##### > *output_type* parameter
The *output_type* property defines the type that the output of a particular *endpoint* should be converted into.
> **Types**: SECONDS | MINUTES | HOURS | YEARS

***Request Body***

```javascript
{
    "date_time": {
        "start": "2021-09-16T07:40:00Z",
        "end": "2022-09-16T07:40:00Z"
    },
    "output_type" : "MINUTES"
}
```
*Example response using the [**/days**](#1-number-of-days-between-two-dates) endpoint*. One year(365 days) has 525600 minutes.

```javascript
{
    "result": 525600
}
```
##### > *timezone* parameter
The *timezone* property specifies a timezone to be used in the comparison of two datetime parameters from different timezones.
> **Timezones**: [Supported Timezones](https://www.php.net/manual/en/timezones.php)

***Request Body***

```javascript
{
    "date_time": {
        "start": "2021-03-15T00:01:00 Indian/Maldives",
        "end": "2022-05-14T00:01:00 Africa/Johannesburg"
    },
    "timezone": "Australia/Adelaide"
}
```
*Example response using the [**/completeweeks**](#3-number-of-complete-weeks-between-two-dates) endpoint*.

```javascript
{
    "result": 60
}
```

##### > *timezone* & *output_type* parameters
The *timezone* and *output_type* properties can be used in conjunction with each other to convert the result of the normal endpoint call into a certain output.

***Request Body***
```javascript
{
    "date_time": {
        "start": "2021-03-15T00:01:00 Indian/Maldives",
        "end": "2022-05-14T00:01:00 Africa/Johannesburg"
    },
    "output_type" : "HOURS",
    "timezone": "Australia/Adelaide"
}
```
*Example response using the **/completeweeks** endpoint*. 60 weeks(420 days) has 10080 hours.

```javascript
{
    "result": 10080
}
```
## API Endpoint - Invalid Parameters & Responses
Whenever an endpoint handles a HTTP request, it validates the parameters received from the request to check whether they are valid. If the parameters are invalid and not acceptable by the endpoint, the endpoint itself will return error messages showing the specific fields that have been misprovided or provided incorrectly. Below are some examples as to what endpoint return when there is missing or incorrect data. It is crucial to mention that in case of invalid parameters being provided, the endpoints will return a [422 response status code](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/422) in the header of the HTTP response rather than the usual [200 - OK](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/200).

> Missing **date_time.start**
```javascript
{
    "date_time.start": [
        "The start date field is required"
    ]
}
```
> Invalid **date_time.start** format
```javascript
{
    "date_time.start": [
        "The field date_time.start is invalid.The expected date time format is: Y-m-d\TH:i:sP"
    ]
}
```
> Missing **date_time.end**
```javascript
{
    "date_time.start": [
        "The end date field is required"
    ]
}
```
> Invalid **date_time.end** format
```javascript
{
    "date_time.start": [
        "The field date_time.end is invalid.The expected date time format is: Y-m-d\TH:i:sP"
    ]
}
```
> Invalid **output_type** option
```javascript
{
    "output_type": [
        "The selected output type is invalid."
    ]
}
```
> Invalid **timezone** option
```javascript
{
    "timezone": [
        "The timezone must be a valid zone."
    ]
}
```

## Running Unit Tests
Unit tests have been written to ensure that the endpoints and classes developed to support these endpoints keep working during the entire development lifecycle of the application. The following command must be executed on the main folder of the application to run all the unit tests.

```sh
php ./vendor/phpunit/phpunit/phpunit
```

## Challenges faced during development
