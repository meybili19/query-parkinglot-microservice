<?php
// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Register the application container
use Slim\Factory\AppFactory;
use App\Controllers\ParkingLotController;

$app = AppFactory::create();

// Register routes
$app->get('/api/parkinglot/{id}', [ParkingLotController::class, 'getById']);
$app->get('/api/parkinglot', [ParkingLotController::class, 'getAll']);

// Run the app
$app->run();
