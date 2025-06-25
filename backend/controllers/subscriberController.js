const Subscriber = require('../models/Subscriber');

exports.subscribe = async (req, res) => {
  const newSub = new Subscriber(req.body);
  await newSub.save();
  res.json({ message: 'Subscribed' });
};
