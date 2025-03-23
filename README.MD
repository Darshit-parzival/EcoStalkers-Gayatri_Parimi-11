🌿 Carbon Footprint Tracker
📌 Project Overview
The Carbon Footprint Tracker is designed to monitor and track the energy consumption of home appliances in real time. By collecting data from current and voltage sensors, the system calculates power usage, which is then used to estimate the carbon footprint.

🔧 Hardware Components
🛠️ Sensors:

ZMPT101B – Voltage sensor to measure AC voltage.

ACS712 – Current sensor to measure current consumption.

🔌 Microcontroller & SBC:

Arduino Uno – Reads data from the sensors and sends it to the Raspberry Pi.

Raspberry Pi 3 Model B+ – Collects data from the Arduino and stores it in a MySQL database for further processing and analysis.

⚡ Power Source:

USB Charger Adapter – Provides real-time power to the setup.

🔥 Software Components
Programming Language: C++ (for Arduino), Python (for Raspberry Pi data handling).

Database: MySQL (running on the laptop using XAMPP).

Communication: Ethernet connection between Raspberry Pi and the laptop for data transfer.

📊 Working Principle
Data Acquisition:

The ZMPT101B measures the voltage, and the ACS712 measures the current consumption of the connected appliance.

Data Transmission:

The Arduino reads the sensor data and transmits it to the Raspberry Pi over serial communication.

Database Storage:

The Raspberry Pi sends the data to the MySQL database on the laptop via Ethernet.

Carbon Footprint Estimation:

The power consumption is calculated using:
𝑃
=
𝑉
×
𝐼
P=V×I

The carbon footprint is estimated based on energy consumption using region-specific emission factors.

🔥 Real-Time Data Visualization
The system allows real-time monitoring of power usage and carbon footprint via a web-based dashboard or terminal output.

🚀 Future Enhancements
Add a web-based dashboard for visualizing historical data and trends.

Integrate machine learning models for better carbon footprint predictions.

Expand the system to support multiple appliances simultaneously.