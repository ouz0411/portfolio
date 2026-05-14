<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

if ($_POST) {
    $title = $_POST["title"];
    $organization = $_POST["organization"];
    $issue_date = $_POST["issue_date"];
    $link = $_POST["link"];

    $stmt = $pdo->prepare("INSERT INTO certificates (title, organization, issue_date, link) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $organization, $issue_date, $link]);

    echo "success";
}
?>
