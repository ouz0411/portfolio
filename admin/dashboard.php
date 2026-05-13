<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

/* PROJECT COUNT */
$projectCount = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();

/* MESSAGE COUNT */
$messageCount = $pdo->query("SELECT COUNT(*) FROM messages")->fetchColumn();

/* PROJECTS */
$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll();
?>

<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h2>Admin Panel</h2>

        <a href="dashboard.php">Dashboard</a>

        <a href="messages.php">Messages</a>

        <a href="../logout.php">Logout</a>

    </div>

    <!-- MAIN -->
    <div class="main-content">

        <h1>Welcome, <?= $_SESSION["user"] ?></h1>

        <!-- STATS -->
        <div class="stats">

            <div class="stat-card">
                <h3>Total Projects</h3>
                <p><?= $projectCount ?></p>
            </div>

            <div class="stat-card">
                <h3>Total Messages</h3>
                <p><?= $messageCount ?></p>
            </div>

        </div>
        
         <!-- ADD SKILL -->
       <!-- ADD SKILL -->
<div class="card add-skill-card">

    <h2>Add Skill</h2>

    <form id="skillForm">

        <div class="form-group">

            <label>Skill Name</label>

            <input
                type="text"
                name="name"
                placeholder="E.g. PHP, React, SQL..."
                required
            >

        </div>

        <button class="btn-submit" type="submit">
            Add Skill
        </button>

    </form>

    <!-- SKILL LIST -->
    <div id="skillsList">

        <?php
        $skills = $pdo->query("SELECT * FROM skills ORDER BY id DESC")->fetchAll();

        foreach($skills as $skill):
        ?>

            <div class="skill-card-admin">

                <?= htmlspecialchars($skill["name"]) ?>

            </div>

        <?php endforeach; ?>

    </div>

</div>


        <!-- ADD PROJECT -->

        <div class="card add-project-card">
           <h2>Add new project</h2>
           <form action="add_project.php" method="POST">
        
        <div class="form-group">
            <label>Project Title</label>
            <input type="text" name="title" placeholder="project name" required>
        </div>
        
        <div class="form-group">
            <label>Project description</label>
            <textarea name="description" placeholder="project description"></textarea>
        </div>
        
        <div class="form-group">
            <label>GitHub Link</label>
            <input type="text" name="github_link" placeholder="github link">
        </div>

        <button class="btn-submit" type="submit">Save Project</button>
    </form>
</div>
        <!-- PROJECT LIST -->
        <h2 style="margin-top:40px;">Projects</h2>

        <?php foreach ($projects as $project): ?>

            <div class="card">

                <h3><?= htmlspecialchars($project["title"]) ?></h3>

                <p><?= htmlspecialchars($project["description"]) ?></p>

                <br>

                <a class="btn"
                   href="edit_project.php?id=<?= $project['id'] ?>">
                   Edit
                </a>

                <a class="btn"
                   href="delete_project.php?id=<?= $project['id'] ?>"
                   onclick="return confirm('Delete this project?')">
                   Delete
                </a>

            </div>

        <?php endforeach; ?>

    </div>

</div>
<script>
    console.log("AJAX SCRIPT LOADED");
    console.log(document.getElementById("skillForm"));

document.addEventListener("DOMContentLoaded", () => {

    const skillForm = document.getElementById("skillForm");
    const skillsList = document.getElementById("skillsList");

    if(!skillForm || !skillsList){
        console.log("Skill form veya list bulunamadı");
        return;
    }

    skillForm.addEventListener("submit", async (e) => {

        e.preventDefault();

        const formData = new FormData(skillForm);

        // 🔥 DOĞRU PATH (MUHTEMEL FIX)
        await fetch("./add_skill.php", {
            method: "POST",
            body: formData
        });

        const res = await fetch("./get_skills.php");
        const html = await res.text();

        skillsList.innerHTML = html;

        skillForm.reset();
    });

});

</script>