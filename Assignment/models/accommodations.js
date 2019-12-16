const mongoose = require('mongoose');
const schema = mongoose.schema;

//create accommodation schema and model

const accomSchema = new schema({
    _id: Number,
    name: String,
    location: String,
    longitude: Number,
    latitude: Number,
    description: String
});

const accommodation = mongoose.model('mongo_accommodations', accomSchema);

module.exports = accommodation;