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

This application has been initially tested on a Windows environment using PHP 7.4.9 and Apache Apache/2.4.43 (Win64) but it also possible to serve the project using PHP's built-in web server by using the following command line on the main directory of the project:

```sh
php -S localhost:8000 -t public
```

## API & Endpoints

In order to meet the requirements of this challenge, three different endpoints have been created. The following sections will be describing each of this endpoints and their respective functionalities.

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

## API Endpoint Parameters & Responses
All endpoints expect the same input parameters, although they return different information from one another. Below are the explanation of the parameters that can be sent in the HTTP requests to the endpoints.

##### > *date_time* parameter
The *date_time* property and its inner object are mandatory fields and therefore no requests will be processed without them.

***Request Body***

```javascript
{
    "date_time": {
        "start": "2021-09-16T07:40:00Z",
        "end": "2022-09-16T07:40:00Z"
    }
}
```
*Example response using the **/days** endpoint*

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
*Example response using the **/days** endpoint*. One year(365 days) has 525600 minutes.

```javascript
{
    "result": 525600
}
```
##### > *timezone* parameter
The *timezone* property specifies a timezone to be used in the comparison of two date time parameters from different timezones.
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
*Example response using the **/completeweeks** endpoint*.

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
