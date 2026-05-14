<?php
require_once "includes/db.php";
$exps = [
    [
        "company" => "BETİLSOFT",
        "role" => "Software Development Intern",
        "desc" => "Worked on full-stack web development projects using Angular, ASP.NET Web API and MySQL.",
        "duration" => "2025"
    ],
    [
        "company" => "FORMEX",
        "role" => "part time reportman",
        "desc" => "Responsible for reporting and organizing delivery notes and shipment documents received from different companies while ensuring accurate data tracking and workflow management",
        "duration" => "2024-2025"
    ]
];

foreach ($exps as $exp) {
    $stmt = $pdo->prepare("INSERT INTO experiences (company, role, description, duration) VALUES (?, ?, ?, ?)");
    $stmt->execute([$exp['company'], $exp['role'], $exp['desc'], $exp['duration']]);
}
echo "Initial experiences inserted.";
?>
