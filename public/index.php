<?php
// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/routes/ParkingLotRoutes.php';

// Create the Slim app
use Slim\Factory\AppFactory;
use App\Controllers\ParkingLotController;

$app = AppFactory::create();

// Define routes
$app->get('/api/parkinglot/{id}', [ParkingLotController::class, 'getById']);
$app->get('/api/parkinglot', [ParkingLotController::class, 'getAll']);

// Run the app
$app->run();
