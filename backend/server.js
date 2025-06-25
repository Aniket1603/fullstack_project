const express = require('express');
const cors = require('cors');
const connectDB = require('./config/db');
require('dotenv').config();

const app = express();
connectDB();

app.use(cors());
app.use(express.json());
app.use('/upload', express.static('upload'));

// Routes
app.use('/api/projects', require('./routes/projectRoutes'));
app.use('/api/clients', require('./routes/clientRoutes'));
app.use('/api/contact', require('./routes/contactRoutes'));
app.use('/api/subscribers', require('./routes/subscriberRoutes'));

app.get('/', (req, res) => {
  res.send('🚀 Flipr Backend API Running');
});

const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`🚀 Server running on port ${PORT}`));
