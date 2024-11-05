<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="p.css">

</head>
<body>


    <?php
    if (isset($_GET['message'])) {
        $messageType = $_GET['type'] ?? 'error'; // Default to 'error' if not set
        $messageClass = $messageType === 'success' ? 'success' : 'error';
        echo '<p class="' . htmlspecialchars($messageClass) . '">' . htmlspecialchars($_GET['message']) . '</p>';
    }
    ?>
    <main>
    <div class="web1">
    <h2>Login</h2>

    <form action="login2.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" value="Login">sumbit</button>


    </form>
    <a href="recovery_psw.php" class="forgot">Forgot Password?</a>

</body>
</html>