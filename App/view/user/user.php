<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'user') {
    header("Location: login.php");
    exit();
}

// Include the header
include "./includes/header.php";
?>

<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-gray-700">Welcome, <?php echo $_SESSION['user_name']; ?>!</h1>
    <p class="mt-4 text-gray-600">This is the user dashboard.</p>
</div>

</body>
</html>

