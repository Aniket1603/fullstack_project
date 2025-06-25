const mongoose = require('mongoose');

const clientSchema = new mongoose.Schema({
  name: String,
  company: String,
  feedback: String,
});

module.exports = mongoose.model('Client', clientSchema);
