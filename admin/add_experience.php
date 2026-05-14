<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

if ($_POST) {
    $company = $_POST["company"];
    $role = $_POST["role"];
    $duration = $_POST["duration"];
    $description = $_POST["description"];

    $stmt = $pdo->prepare("INSERT INTO experiences (company, role, duration, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$company, $role, $duration, $description]);

    echo "success";
}
?>
