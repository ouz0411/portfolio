<?php
require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $message = $_POST["message"] ?? '';

    if (!empty($name) && !empty($email) && !empty($message)) {

        $stmt = $pdo->prepare("
            INSERT INTO messages (name, email, message)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([$name, $email, $message]);
    }

    header("Location: index.php#contact");
    exit;
}
?>