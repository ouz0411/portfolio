<?php
session_start();
require_once "includes/db.php";

$error = null;

if ($_POST) {

    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["username"];
        header("Location: admin/dashboard.php");
        exit;
    } else {
        $error = "Wrong login!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<link rel="stylesheet" href="assets/css/admin.css">
</head>

<body class="login-body">

<div class="login-box">

    <h2>Admin Login</h2>

    <?php if($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">

        <input name="username" placeholder="Username" required>

        <input name="password" type="password" placeholder="Password" required>

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>