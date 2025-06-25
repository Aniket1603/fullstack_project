const Client = require('../models/Client');

exports.getClients = async (req, res) => {
  const clients = await Client.find();
  res.json(clients);
};

exports.addClient = async (req, res) => {
  const newClient = new Client(req.body);
  await newClient.save();
  res.json(newClient);
};
