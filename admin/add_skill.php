<?php

require_once "../includes/db.php";
require_once "../includes/auth.php";

if($_POST){

    $name = $_POST["name"];

    $stmt = $pdo->prepare("INSERT INTO skills(name) VALUES (?)");
    $stmt->execute([$name]);

    // başarı mesajı
    echo "success";
}
?>