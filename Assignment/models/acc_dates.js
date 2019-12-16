const mongoose = require('mongoose');
const schema = mongoose.schema;

//create acc_dates schema and model

const acc_date = new schema({
    _id: Number,
    acc_id: Number,
    thedate: Number,
    availibility: Number
});

const acc_dates = mongoose.model('mongo_acc_dates', acc_date);

module.exports = acc_dates;