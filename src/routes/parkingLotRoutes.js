const express = require('express');
const router = express.Router();
const { getParkingLotById } = require('../controllers/parkingLotController');

router.get('/parkinglots/:id', getParkingLotById);

module.exports = router;
