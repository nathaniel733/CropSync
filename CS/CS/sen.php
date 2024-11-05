<?php
// Path to the .txt file
$file_path = 'C:\xampp\htdocs\template\jon\sen.txt';

// Read the file content
$file_content = file_get_contents($file_path);

if ($file_content === false) {
    die("Error reading the file");
}

// Split the content into lines
$lines = explode("\n", trim($file_content));

// Initialize an array to store the ordered readings
$ordered_readings = array();

// Get the current timestamp
$current_timestamp = date('Y-m-d H:i:s');

foreach ($lines as $line) {
    // Split each line into sensor name and reading
    list($sensor_name, $reading) = explode(':', $line, 2);

    $sensor_name = trim($sensor_name);
    $reading = trim($reading);
    
    // Append the timestamp, sensor name, and reading to the ordered readings array
    $ordered_readings[] = "$current_timestamp - $sensor_name: $reading";
}

// Print the formatted data
echo "<h2>Sensor Readings</h2>";
echo "<ul>";
foreach ($ordered_readings as $entry) {
    echo "<li>$entry</li>";
}
echo "</ul>";
?>
