<?php

session_start();

include_once __DIR__ . '../config/Database.php'; 
include './Validation.php'; 
$database = new Database(); 
$conn = $database->connect(); 
$validation = new Validation($conn); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'register') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $user_id = $validation->registration($name, $email, $password);

            if ($user_id) {
                echo "Registration successful! Please login.";
                header("location: ../public/Signin.php");
                exit();
            }
        } catch (Exception $e) {
            echo "Registration failed: " . $e->getMessage();
        }
    } elseif ($action === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $user = $validation->validateLogin($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];

                if ($user['role'] === 'admin') {
                    header("Location: ../view/admin/admin.php");
                } else {
                    header("Location: ../view/user/user.php");
                }
                exit();
            }
        } catch (Exception $e) {
            echo "Login failed: " . $e->getMessage();
        }
    }
}
