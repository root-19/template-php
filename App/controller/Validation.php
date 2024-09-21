<?php
class Validation {

private $conn; 

public function __construct($conn) {
    $this->conn = $conn;
}

public function registration($name, $email, $password, $role = 'user') {
    if (empty($name) || empty($email) || empty($password)) {
        die("Please fill all fields.");
    }

    // Hash the password
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
    $stmt = $this->conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . implode(", ", $this->conn->errorInfo()));
    }

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hash_password);
    $stmt->bindParam(':role', $role);

    // Execute the statement
    if ($stmt->execute()) {
        return $this->conn->lastInsertId();
    } else {
        die("Insert failed: " . implode(", ", $stmt->errorInfo()));
    }
}

public function validateLogin($email, $password) {
    // Prepare the SQL statement
    $sql = "SELECT id, name, password, role  FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . implode(", ", $this->conn->errorInfo()));
    }

    // Bind email parameter
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check for any errors
    if ($stmt->errorCode() != '00000') {
        die("Execute failed: " . implode(", ", $stmt->errorInfo()));
    }

    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            return $user; // Return user details if password matches
        } else {
            die("Invalid password.");
        }
    } else {
        die("User not found.");
    }
}

}
