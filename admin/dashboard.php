<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll();
?>

<link rel="stylesheet" href="../assets/css/admin.css">

<div class="container">

    <h1>Admin Panel</h1>

    <p>Welcome, <?php echo $_SESSION["user"]; ?></p>

    <div style="margin-bottom:20px;">
        <a class="btn" href="../logout.php">Logout</a>
        <a class="btn" href="messages.php">View Messages</a>
    </div>

    <!-- ADD PROJECT -->
    <div class="card">

        <h2>Add Project</h2>

        <form action="add_project.php" method="POST">

            <input name="title" placeholder="Project Title" required>
            <br><br>

            <textarea name="description" placeholder="Description"></textarea>
            <br><br>

            <input name="github_link" placeholder="GitHub Link">
            <br><br>

            <button class="btn" type="submit">Add Project</button>

        </form>

    </div>

    <!-- PROJECT LIST -->
    <h2 style="margin-top:40px;">Projects</h2>

    <?php foreach ($projects as $project): ?>

        <div class="card">

            <h3><?= htmlspecialchars($project["title"]) ?></h3>

            <p><?= htmlspecialchars($project["description"]) ?></p>

            <?php if (!empty($project["github_link"])): ?>
                <a href="<?= htmlspecialchars($project["github_link"]) ?>" target="_blank">
                    View Project
                </a>
            <?php endif; ?>

            <br><br>
             <!-- EDIT BUTTON -->
        <a class="btn" href="edit_project.php?id=<?= $project['id'] ?>">
            Edit
        </a>

            <!-- DELETE BUTTON -->
            <a class="btn" href="delete_project.php?id=<?= $project['id'] ?>" 
               onclick="return confirm('Delete this project?')">
               Delete
            </a>

        </div>

    <?php endforeach; ?>

</div>