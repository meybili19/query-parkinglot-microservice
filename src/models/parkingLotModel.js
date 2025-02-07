const pool = require('../config/db');

const getParkingLotById = async (id) => {
    const [rows] = await pool.query('SELECT * FROM ParkingLot WHERE id = ?', [id]);
    return rows.length ? rows[0] : null;
};

module.exports = { getParkingLotById };