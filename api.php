<?php
require_once "includes/db.php";

header('Content-Type: application/json');
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$response = [];

// Fetch projects
$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$response['projects'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch skills
$skillStmt = $pdo->query("SELECT * FROM skills ORDER BY id DESC");
$response['skills'] = $skillStmt->fetchAll(PDO::FETCH_ASSOC);

// Experiences
$expStmt = $pdo->query("SELECT * FROM experiences ORDER BY id DESC");
$response['experiences'] = [];
while($row = $expStmt->fetch(PDO::FETCH_ASSOC)) {
    $response['experiences'][] = [
        "company" => $row['company'],
        "role" => $row['role'] . " (" . $row['duration'] . ")",
        "desc" => $row['description']
    ];
}

// Certificates
$certStmt = $pdo->query("SELECT * FROM certificates ORDER BY id DESC");
$response['certificates'] = $certStmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($response);
?>
