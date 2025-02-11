const express = require('express');
const router = express.Router();
const { getParkingLotById, getAllParkingLots } = require('../controllers/parkingLotController');

router.get('/parkinglots/:id', getParkingLotById);
router.get('/all/parkinglots', getAllParkingLots);

module.exports = router;
