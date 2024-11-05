<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php?message=Please log in to access the dashboard.&type=error");
    exit();
}

// Fetch the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .welcome {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .nav {
            margin-bottom: 20px;
        }
        .nav a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 15px;
        }
        .nav a:hover {
            text-decoration: underline;
        }
        .logout {
            color: #FF0000;
            text-decoration: none;
        }
        .logout:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            Welcome, <?php echo htmlspecialchars($username); ?>!
        </div>

        <div class="nav">
            <a href="profile.php">Profile</a>
            <a href="settings.php">Settings</a>
            <a href="reports.php">Reports</a>
        </div>

        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
