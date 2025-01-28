<?php
use Slim\App;
use App\Controllers\ParkingLotController;

return function (App $app) {
    $app->get('/api/parkinglot', \App\Controllers\ParkingLotController::class .'getAllParkingLots');
    $app->get('/api/parkinglot/{id}', \App\Controllers\ParkingLotController::class . ':getById');
};
