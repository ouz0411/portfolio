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
    <title>Messages - Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

<div class="admin-layout">

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="messages.php">Messages</a>
        <a href="../logout.php">Logout</a>
    </div>

    <div class="main-content">
    <h1>📩 Contact Messages</h1>

    <table class="message-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td style="font-weight: bold; color: #38bdf8;">
                        <?= htmlspecialchars($msg["name"]) ?>
                    </td>
                    <td><?= htmlspecialchars($msg["email"]) ?></td>
                    <td class="message-text"><?= htmlspecialchars($msg["message"]) ?></td>
                    <td><?= $msg["created_at"] ?></td>
                    <td>
                        <a class="btn btn-danger" href="delete_message.php?id=<?= $msg['id'] ?>" onclick="return confirm('Silinsin mi?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>