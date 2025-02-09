const pool = require('../config/db');

const getParkingLotById = async (id) => {
    const [rows] = await pool.query(
        'SELECT id, name, total_space, address, capacity FROM ParkingLot WHERE id = ?',
        [id]
    );
    return rows.length ? rows[0] : null;
};

module.exports = { getParkingLotById };
