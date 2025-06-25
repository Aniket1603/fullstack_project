const ContactForm = require('../models/ContactForm');

exports.submitContact = async (req, res) => {
  const newMsg = new ContactForm(req.body);
  await newMsg.save();
  res.json({ message: 'Contact submitted' });
};
