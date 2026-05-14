<?php
require_once "includes/db.php";
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS experiences (
        id INT AUTO_INCREMENT PRIMARY KEY,
        company VARCHAR(255) NOT NULL,
        role VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        duration VARCHAR(255)
    )");
    echo "Table 'experiences' created successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
