const pool = require('../config/db');

const getParkingLotById = async (id) => {
    const [rows] = await pool.query(
        'SELECT id, name, total_space, address, capacity FROM ParkingLot WHERE id = ?',
        [id]
    );
    return rows.length ? rows[0] : null;
};

const getAllParkingLots = async () => {
    try {
        const [rows] = await pool.query('SELECT id, name, total_space, address, capacity FROM ParkingLot');
        return rows;
    } catch (error) {
        console.error("SQL Query Error:", error); // <-- Agregar log en la consola
        throw error;
    }
};


module.exports = { getParkingLotById, getAllParkingLots };
