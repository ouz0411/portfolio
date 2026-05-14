<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

if (!isset($_GET["id"])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET["id"];
$stmt = $pdo->prepare("DELETE FROM experiences WHERE id = ?");
$stmt->execute([$id]);

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    echo "success";
} else {
    header("Location: dashboard.php");
}
exit;
?>
