<?php
session_start(); // Start the session

// Destroy all session data
session_unset();
session_destroy();

// Output HTML with loading message and animation
echo '<!DOCTYPE html>
<html>
<head>
    <title>Logging Out</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .logout-wrapper {
            text-align: center;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 20px;
        }
        .logout-message {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 20px;
        }
        .spinner-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            background-color: #f7f7f7; /* Light background for better visibility */
        }
        .spinner {
            border: 12px solid #f3f3f3; /* Light grey */
            border-top: 12px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 40px; /* Slightly larger */
            height: 40px; /* Slightly larger */
            animation: spin 1.5s linear infinite;
            position: relative;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.2) 50%, transparent 50%); /* Subtle gradient effect */
        }
        .spinner::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 10px; /* Inner circle size */
            height: 10px; /* Inner circle size */
            background-color: #3498db; /* Blue */
            border-radius: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 10px rgba(0,0,0,25); /* Soft shadow */
            animation: pulse 1.5s infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }
            100% {
                transform: scale(1);
                opacity: 0.7;
            }
        }
    </style>
</head>
<body>
    <div class="logout-wrapper">
        <div class="logout-message">You are being logged out. Please wait...</div>
        <div class="spinner"></div>
        <div class="redirect-message">Redirecting ........</div>
    </div>
    <script>
        // Redirect after a short delay to show the loading message
        setTimeout(function() {
            window.location.href = "login1.php"; // Redirect to login page
        }, 1500); // Adjust the delay as needed (1.5 seconds here)
    </script>
</body>
</html>';
exit;
?>
