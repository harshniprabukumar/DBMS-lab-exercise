<?php
session_start();

// Redirect to index.php if already logged in
if (isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

// Dummy username and password
$dummy_username = 'admin';
$dummy_password = 'admin123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match dummy values
    if ($username === $dummy_username && $password === $dummy_password) {
        // Dummy login successful, set session variable
        $_SESSION['admin'] = $username;
        header('Location: index.php');
        exit;
    } else {
        // Dummy login failed, show error message
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <?php if (isset($error)) { echo "<div class='error'>$error</div>"; } ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
