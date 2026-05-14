<?php
require_once "includes/db.php";
try {
    $skillStmt = $pdo->query("SELECT * FROM skills ORDER BY id DESC");
    $skills = $skillStmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Total skills: " . count($skills) . "\n";
    foreach ($skills as $s) {
        echo "- " . $s['name'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
