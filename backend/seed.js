// seed.js
const mongoose = require('mongoose');
const Project = require('./models/Project');
require('dotenv').config();

mongoose.connect(process.env.MONGO_URI)
  .then(async () => {
    await Project.deleteMany({});
    await Project.insertMany([
      {
        name: "Consultation",
        description: "Urban Highrise, Mumbai",
        image: "/image1.svg"
      },
      {
        name: "Builders",
        description: "Site Safety Audits, Mumbai",
        image: "/image2.svg"
      },
      {
        name: "Marketing & Design",
        description: "Rebranding Strategy, Luxury Apparel – Mumbai",
        image: "/image3.svg"
      },
      {
        name: "Real-Estate & Construction",
        description: "Brand Campaign, Delhi",
        image: "/image4.svg"
      }
    ]);
    console.log('✅ Sample projects inserted.');
    process.exit(0);
  })
  .catch(err => {
    console.error('❌ Error:', err.message);
    process.exit(1);
  });
