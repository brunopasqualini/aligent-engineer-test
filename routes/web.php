<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\DateTime\NumberCompleteWeeksController;
use App\Http\Controllers\DateTime\NumberDaysController;
use App\Http\Controllers\DateTime\NumberWeekdaysController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'Aligent - Programming Test';
});

$router->group(['prefix' => 'datetime'], function () use ($router) {
    $router->post('/days', NumberDaysController::class);
    $router->post('/weekdays', NumberWeekdaysController::class);
    $router->post('/completeweeks', NumberCompleteWeeksController::class);
});
