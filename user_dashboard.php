<?php
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "sensor_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sensor_readings ORDER BY timestamp DESC LIMIT 20";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sensor Dashboard</title>
    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        canvas { max-width: 800px; }
    </style>
</head>
<body>
    <h2>Live Sensor Data</h2>
    <table border='1' cellspacing='0' cellpadding='5'>
        <thead>
            <tr><th>ID</th><th>Voltage (V)</th><th>Current (A)</th><th>CO2 Emission (ppm)</th><th>Timestamp</th></tr>
        </thead>
        <tbody id='sensor-table'></tbody>
    </table>

    <h2>Sensor Data Chart</h2>
    <canvas id='sensorChart'></canvas>

    <script>
        function fetchSensorData() {
            $.getJSON('user_dashboard.php', function(data) {
                let tableRows = '';
                let labels = [], voltageData = [], currentData = [], co2Data = [];

                data.reverse().forEach(row => {
                    tableRows += `<tr><td>${row.id}</td><td>${row.voltage}</td><td>${row.current}</td><td>${row.co2_emission}</td><td>${row.timestamp}</td></tr>`;
                    labels.push(row.timestamp);
                    voltageData.push(row.voltage);
                    currentData.push(row.current);
                    co2Data.push(row.co2_emission);
                });

                $('#sensor-table').html(tableRows);

                updateChart(labels, voltageData, currentData, co2Data);
            });
        }

        function updateChart(labels, voltageData, currentData, co2Data) {
            let ctx = document.getElementById('sensorChart').getContext('2d');
            if (window.sensorChart) window.sensorChart.destroy();

            window.sensorChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        { label: 'Voltage (V)', data: voltageData, borderColor: 'blue', fill: false },
                        { label: 'Current (A)', data: currentData, borderColor: 'green', fill: false },
                        { label: 'CO2 Emission (ppm)', data: co2Data, borderColor: 'red', fill: false }
                    ]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }

        setInterval(fetchSensorData, 5000);
        fetchSensorData();
    </script>
</body>
</html>
