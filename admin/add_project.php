<?php
require_once "../includes/db.php";

$title = $_POST["title"];
$description = $_POST["description"];
$github = $_POST["github_link"];

$sql = "INSERT INTO projects (title, description, github_link)
        VALUES (?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $description, $github]);

header("Location: dashboard.php");
exit;
?>