<?php
class Validation {

private $conn;

public function __construct($conn) {
    $this->conn = $conn;
}

public function registration($name, $email, $password, $role = 'user') {
    if (empty($name) || empty($email) || empty($password)) {
        throw new Exception("Please fill all fields.");
    }

    // Hash the password
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
    $stmt = $this->conn->prepare($sql);

    if ($stmt === false) {
        throw new Exception("Prepare failed: " . implode(", ", $this->conn->errorInfo()));
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
        throw new Exception("Insert failed: " . implode(", ", $stmt->errorInfo()));
    }
}

public function validateLogin($email, $password) {
    $sql = "SELECT id, name, password, role FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);

    if ($stmt === false) {
        throw new Exception("Prepare failed: " . implode(", ", $this->conn->errorInfo()));
    }

    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->errorCode() != '00000') {
        throw new Exception("Execute failed: " . implode(", ", $stmt->errorInfo()));
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
            throw new Exception("Invalid password.");
        }
    } else {
        throw new Exception("User not found.");
    }
}
}
