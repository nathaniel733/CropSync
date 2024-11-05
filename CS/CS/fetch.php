<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get sensor data
$sql = "SELECT filename, filecontent FROM textfiles";
$result = $conn->query($sql);

// Prepare data for Chart.js
$sensorNames = [];
$readings = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sensorName = pathinfo($row['filename'], PATHINFO_FILENAME);
        $readings[] = (float)trim($row['filecontent']); // Assume filecontent contains a single reading, convert to float
        $sensorNames[] = htmlspecialchars($sensorName);
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Readings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        .chart-container {
            width: 80%;
            margin: 20px auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Sensor Readings</h1>
    <div class="chart-container">
        <canvas id="sensorChart"></canvas>
    </div>

    <script>
        // Get data from PHP
        const sensorNames = <?php echo json_encode($sensorNames); ?>;
        const readings = <?php echo json_encode($readings); ?>;

        // Create bar chart
        const ctx = document.getElementById('sensorChart').getContext('2d');
        const sensorChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: sensorNames,
                datasets: [{
                    label: 'Sensor Readings',
                    data: readings,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y.toFixed(2);
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
