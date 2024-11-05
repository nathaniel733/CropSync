<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<link rel="stylesheet" href="registerstyle.css">
</head>
<body>


    <main>
        
        <div class="web1">
        <section class="register.php">
            <h1>Register</h1>
            <form action="register.php" method="post">
        
            <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

               <center> <button type="submit">Register</button></center>
            </form>
        </section>
    </main>

?>
</body>
</html>