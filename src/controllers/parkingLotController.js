const ParkingLot = require('../models/parkingLotModel');

const getParkingLotById = async (req, res) => {
    try {
        const { id } = req.params;
        if (!id) {
            return res.status(400).json({ message: 'Parking lot ID is required' });
        }
        
        const parkingLot = await ParkingLot.getParkingLotById(id);
        if (!parkingLot) {
            return res.status(404).json({ message: 'Parking lot not found' });
        }
        
        res.status(200).json(parkingLot);
    } catch (error) {
        res.status(500).json({ message: 'Error fetching the parking lot', error });
    }
};

const getAllParkingLots = async (req, res) => {
    try {
        const parkingLots = await ParkingLot.getAllParkingLots();
        res.status(200).json(parkingLots);
    } catch (error) {
        res.status(500).json({ message: 'Error fetching parking lots', error });
    }
};

module.exports = { getParkingLotById, getAllParkingLots };


