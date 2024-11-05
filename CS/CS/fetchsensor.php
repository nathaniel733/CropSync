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

// HTML structure for displaying data
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '    <meta charset="UTF-8">';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '    <title>Sensor Readings</title>';
echo '    <style>';
echo '        body {';
echo '            font-family: Arial, sans-serif;';
echo '            text-align: center;';
echo '            background-color: #f4f4f4;';
echo '        }';
echo '        table {';
echo '            width: 80%;';
echo '            margin: 20px auto;';
echo '            border-collapse: collapse;';
echo '            background-color: #ffffff;';
echo '            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);';
echo '        }';
echo '        th, td {';
echo '            padding: 10px;';
echo '            border: 1px solid #ddd;';
echo '            text-align: left;';
echo '        }';
echo '        th {';
echo '            background-color: #f2f2f2;';
echo '        }';
echo '    </style>';
echo '</head>';
echo '<body>';
echo '    <h1>Sensor Readings</h1>';

if ($result->num_rows > 0) {
    echo '<table>';
    echo '    <thead>';
    echo '        <tr>';
    echo '            <th>Sensor Name</th>';
    echo '            <th>Readings</th>';
    echo '        </tr>';
    echo '    </thead>';
    echo '    <tbody>';

    while ($row = $result->fetch_assoc()) {
        $sensorName = pathinfo($row['filename'], PATHINFO_FILENAME);
        $readings = nl2br(htmlspecialchars($row['filecontent'])); // Convert newlines to <br> and escape HTML

        echo '        <tr>';
        echo '            <td>' . htmlspecialchars($sensorName) . '</td>';
        echo '            <td>' . $readings . '</td>';
        echo '        </tr>';
    }

    echo '    </tbody>';
    echo '</table>';
} else {
    echo '<p>No data found.</p>';
}

// Close the connection
$conn->close();

echo '</body>';
echo '</html>';
?>
