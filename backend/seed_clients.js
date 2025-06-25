const mongoose = require('mongoose');
const Client = require('./models/Client'); // Make sure this path is correct
require('dotenv').config();

mongoose.connect(process.env.MONGO_URI)
  .then(async () => {
    await Client.deleteMany({});
    await Client.insertMany([
      {
        name: "Rohan",
        company: "Managing Partner",
        feedback: "Trusted Real Estate Consultant",
        image: "/rohan.svg"
      },
      {
        name: "Aditi",
        company: "Project Coordinator",
        feedback: "Specialist in Marketing & Design",
        image: "/aditi.svg"
      },
      {
        name: "Aachal",
        company: "Site Engineer",
        feedback: "Expert in Construction Oversight",
        image: "/aachal.svg"
      },
      {
        name: "Jon",
        company: "Senior Architect",
        feedback: "Innovative Designs and Consulting",
        image: "/jon.svg"
      },
      {
        name: "Priya",
        company: "Client Liaison",
        feedback: "Dedicated Customer Support",
        image: "/priya.svg"
      }
    ]);
    console.log('✅ Sample clients inserted.');
    process.exit(0);
  })
  .catch(err => {
    console.error('❌ Error inserting clients:', err.message);
    process.exit(1);
  });
