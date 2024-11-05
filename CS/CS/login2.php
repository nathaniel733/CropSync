<?php
session_start(); // Start the session

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
    // Redirect with error message
    header('Location: login1.php?message=Username and password are required.&type=error');
    exit;
}

// Prepare SQL statement
$sql = 'SELECT * FROM users WHERE username = ?';
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . $mysqli->error);
}

$stmt->bind_param('s', $inputUsername);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

// Check login credentials
if ($user && password_verify($inputPassword, $user['password'])) {
    // Set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $inputUsername;

    // Output HTML with loading message and spinner
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Login Successful</title>
        <style>
            /* Basic styling for loading spinner */
            .loading-wrapper {
                text-align: center;
                margin-top: 20%;
            }
            .loading-spinner {
                border: 16px solid #f3f3f3; /* Light grey */
                border-top: 16px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 120px;
                height: 120px;
                animation: spin 2s linear infinite;
                margin: 0 auto;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            p {
                font-size: 1.2em;
                color: #333;
            }
        </style>
    </head>
    <body>
        <div class="loading-wrapper">
            <p>Login successful. Redirecting...</p>
            <div class="loading-spinner"></div>
        </div>
        <script>
            // Redirect after a short delay to show the loading message
            setTimeout(function() {
                window.location.href = "prac1.php"; // Replace with your target page
            }, 500); // Adjust the delay as needed (0.5 seconds here)
        </script>
    </body>
    </html>';
    exit;
} else {
    // Output HTML with error message and redirect
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Login Failed</title>
    </head>
    <body>
        <script type="text/javascript">
            alert("Invalid username or password.");
            setTimeout(function() {
                window.location.href = "login1.php?";
            }, 1000); // Redirect after a short delay (1 second here)
        </script>
    </body>
    </html>';
    exit;
}

$stmt->close();
$mysqli->close();
?>
