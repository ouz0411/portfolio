<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

$stmt = $pdo->query("SELECT * FROM messages ORDER BY id DESC");
$messages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Messages</title>

    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

<div class="container">

    <h1>📩 Contact Messages</h1>

    <a class="btn" href="dashboard.php">← Back to Dashboard</a>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>

        <?php foreach ($messages as $msg): ?>
            <tr>
                <td><?= $msg["id"] ?></td>
                <td><?= htmlspecialchars($msg["name"]) ?></td>
                <td><?= htmlspecialchars($msg["email"]) ?></td>
                <td><?= htmlspecialchars($msg["message"]) ?></td>
                <td><?= $msg["created_at"] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</div>

</body>
</html>