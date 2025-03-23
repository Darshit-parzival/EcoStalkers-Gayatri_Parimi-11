<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome, " . $_SESSION['user_name'] . "!</h1>";
echo '<a href="logout.php">Logout</a>';
?>


<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensor_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch latest 100 records
$sql = "SELECT timestamp, voltage, current, co2_emission FROM sensor_readings ORDER BY timestamp DESC LIMIT 100";
$result = $conn->query($sql);

$timestamps = [];
$voltages = [];
$currents = [];
$co2_emissions = [];

while ($row = $result->fetch_assoc()) {
    $timestamps[] = $row['timestamp'];
    $voltages[] = $row['voltage'];
    $currents[] = $row['current'];
    $co2_emissions[] = $row['co2_emission'];
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Stalkers Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Tahoma:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container-fluid">
        <header class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom">
            <div class="d-flex align-items-center">
                <span class="ti ti-leaf fs-3 me-2"></span>
                <h1 class="h4">Eco Stalkers</h1>
            </div>
            <nav>
                <a href="#" class="btn btn-outline-primary me-2">Features</a>
                <a href="#" class="btn btn-outline-secondary me-2">The Problem</a>
                <a href="#" class="btn btn-outline-success me-2">Our Solution</a>
                <a href="#" class="btn btn-outline-warning">About Us</a>
            </nav>
        </header>

        <main>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Goal Status</h5>
                            <p class="card-text"><?php echo end($co2_emissions); ?> kg CO₂e - Updated Live 🔥</p>
                            <canvas id="goalChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Weekly Summary</h5>
                            <p class="card-text">Latest CO₂ Emission Data</p>
                            <canvas id="weeklyChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Today's Emissions</h5>
                            <p class="card-text"><?php echo end($co2_emissions); ?> kg CO₂e</p>
                            <canvas id="todayChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Convert PHP arrays to JavaScript
        const timestamps = <?php echo json_encode($timestamps); ?>;
        const voltages = <?php echo json_encode($voltages); ?>;
        const currents = <?php echo json_encode($currents); ?>;
        const co2Emissions = <?php echo json_encode($co2_emissions); ?>;

        // Ensure data exists
const latestEmission = co2Emissions.length > 0 ? parseFloat(co2Emissions[0]) : 0;
const remaining = Math.max(100 - latestEmission, 0); // Avoid negative values

// Goal Chart (Doughnut)
const goalCtx = document.getElementById('goalChart').getContext('2d');
new Chart(goalCtx, {
    type: 'doughnut',
    data: {
        labels: ['Used', 'Remaining'],
        datasets: [{
            data: [latestEmission, remaining],
            backgroundColor: ['#27ae60', '#f1f1f1']
        }]
    }
});


        // Weekly Summary (Bar Chart)
        const weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
        new Chart(weeklyCtx, {
            type: 'bar',
            data: {
                labels: timestamps.slice(0, 7).reverse(),
                datasets: [{
                    label: 'Emissions (kg CO₂e)',
                    data: co2Emissions.slice(0, 7).reverse(),
                    backgroundColor: '#27ae60'
                }]
            }
        });

        // Today's Emissions (Line Chart)
        const todayCtx = document.getElementById('todayChart').getContext('2d');
        new Chart(todayCtx, {
            type: 'line',
            data: {
                labels: timestamps.reverse(),
                datasets: [{
                    label: 'Hourly Emissions (kg CO₂e)',
                    data: co2Emissions.reverse(),
                    borderColor: '#27ae60',
                    fill: false
                }]
            }
        });
    </script>
</body>
</html>
