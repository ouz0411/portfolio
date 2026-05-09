<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

if (!isset($_GET["id"])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET["id"];

$stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
$stmt->execute([$id]);

header("Location: dashboard.php");
exit;
?>