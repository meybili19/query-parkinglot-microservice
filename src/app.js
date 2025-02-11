const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const parkingLotRoutes = require('./routes/parkingLotRoutes');
require('dotenv').config();

const app = express();
app.use(cors());
app.use(bodyParser.json());
app.use(parkingLotRoutes);

module.exports = app;
