<?php

$host = 'localhost';
$dbname = 'user';
$username = 'root'; // Update with your MySQL username
$password = ''; // Update with your MySQL password

// Create a new mysqli instance
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Get POST data
$inputUsername = $_POST['username'] ?? '';
$inputPassword = $_POST['password'] ?? '';

// Validate input
if (empty($inputUsername) || empty($inputPassword)) {
    echo '<p>Username and password are required.</p>';
    echo '<script>setTimeout(function(){ window.location.href = "login.html"; }, 3000);</script>';
    exit;
}


$sql = 'SELECT * FROM users WHERE username = ?';
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . $mysqli->error);
}

$stmt->bind_param('s', $inputUsername);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user && password_verify($inputPassword, $user['password'])) {
    
    echo '<p>Login successful. Redirecting...</p>';
   
} else {

    echo '<p>Invalid username or password.</p>';
    echo '<script>setTimeout(function(){ window.location.href = "login.html"; }, 3000);</script>';
}


$stmt->close();
$mysqli->close();
?>
