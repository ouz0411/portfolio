<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

if (!isset($_GET["id"])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET["id"];

/* PROJECT GET */
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch();

if (!$project) {
    echo "Project not found!";
    exit;
}

/* UPDATE PROCESS */
if ($_POST) {

    $title = $_POST["title"] ?? '';
    $description = $_POST["description"] ?? '';
    $github_link = $_POST["github_link"] ?? '';

    $update = $pdo->prepare("
        UPDATE projects 
        SET title = ?, description = ?, github_link = ?
        WHERE id = ?
    ");

    $update->execute([$title, $description, $github_link, $id]);

    header("Location: dashboard.php");
    exit;
}
?>

<link rel="stylesheet" href="../assets/css/admin.css">

<div class="container">

    <h1>Edit Project</h1>

    <div class="card">

        <form method="POST">

            <input name="title"
                   value="<?= htmlspecialchars($project["title"]) ?>"
                   required>
            <br><br>

            <textarea name="description"><?= htmlspecialchars($project["description"]) ?></textarea>
            <br><br>

            <input name="github_link"
                   value="<?= htmlspecialchars($project["github_link"]) ?>">
            <br><br>

            <button class="btn" type="submit">Update Project</button>

        </form>

    </div>

    <br>

    <a class="btn" href="dashboard.php">Back</a>

</div>