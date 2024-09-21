<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?>!</h1>
    <p>This is the user dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
