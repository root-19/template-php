<?php
session_start();
require_once 'Database.php';
require_once 'Validation.php';

// Create a database connection
$db = new Database();
$conn = $db->connect();

// Create the controller instance
$validation = new Validation($conn);

// Check if form is submitted for either registration or login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action']; 
    
    if ($action === 'register') {
        // Registration Logic
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        try {
            $user_id = $controller->registration($name, $email, $password);

            if ($user_id) {
                echo "Registration successful! Please login.";
            }
        } catch (Exception $e) {
            echo "Registration failed: " . $e->getMessage();
        }

    } elseif ($action === 'login') {
        // Login Logic
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        try {
            $user = $controller->validateLogin($email, $password);
            
            if ($user) {
                // Store user details in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
                
                // Redirect based on user role
                if ($user['role'] === 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: user.php");
                }
                exit();
            }
        } catch (Exception $e) {
            echo "Login failed: " . $e->getMessage();
        }
    }
}
?>
