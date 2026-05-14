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
                <a href="delete_skill.php?id=<?= $skill['id'] ?>" class="delete-skill" data-id="<?= $skill['id'] ?>" style="margin-left:10px; color:red; text-decoration:none; font-weight:bold;">&times;</a>

            </div>

        <?php endforeach; ?>

    </div>

</div>


        <!-- ADD EXPERIENCE -->
        <div class="card add-experience-card">
            <h2>Add Experience</h2>
            <form id="expForm">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="form-group">
                        <label>Company</label>
                        <input type="text" name="company" placeholder="E.g. Google" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="role" placeholder="E.g. Web Developer" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Duration</label>
                    <input type="text" name="duration" placeholder="E.g. 2023 - Present" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" placeholder="What did you do?" style="min-height:100px;"></textarea>
                </div>
                <button class="btn-submit" type="submit">Save Experience</button>
            </form>

            <h3 style="margin-top:30px; color:#38bdf8;">Current Experiences</h3>
            <div id="expList" style="margin-top:20px;">
                <?php
                $exps = $pdo->query("SELECT * FROM experiences ORDER BY id DESC")->fetchAll();
                foreach($exps as $exp):
                ?>
                    <div class="experience-item-admin">
                        <h4><?= htmlspecialchars($exp["company"]) ?></h4>
                        <p style="font-weight:bold;"><?= htmlspecialchars($exp["role"]) ?> (<?= htmlspecialchars($exp["duration"]) ?>)</p>
                        <p style="font-size:14px; color:#94a3b8;"><?= htmlspecialchars($exp["description"]) ?></p>
                        <a href="delete_experience.php?id=<?= $exp['id'] ?>" class="delete-exp btn-delete" data-id="<?= $exp['id'] ?>">Sil</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <!-- ADD CERTIFICATE -->
        <div class="card add-certificate-card">
            <h2>Add Certificate</h2>
            <form id="certForm">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="form-group">
                        <label>Certificate Title</label>
                        <input type="text" name="title" placeholder="E.g. Web Development" required>
                    </div>
                    <div class="form-group">
                        <label>Organization</label>
                        <input type="text" name="organization" placeholder="E.g. Udemy" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Issue Date</label>
                    <input type="text" name="issue_date" placeholder="E.g. 2024" required>
                </div>
                <button class="btn-submit" type="submit">Save Certificate</button>
            </form>

            <h3 style="margin-top:30px; color:#38bdf8;">Current Certificates</h3>
            <div id="certList" style="margin-top:20px;">
                <?php
                $certs = $pdo->query("SELECT * FROM certificates ORDER BY id DESC")->fetchAll();
                foreach($certs as $cert):
                ?>
                    <div class="experience-item-admin">
                        <h4><?= htmlspecialchars($cert["title"]) ?></h4>
                        <p style="font-weight:bold;"><?= htmlspecialchars($cert["organization"]) ?> (<?= htmlspecialchars($cert["issue_date"]) ?>)</p>
                        <a href="delete_certificate.php?id=<?= $cert['id'] ?>" class="delete-cert btn-delete" data-id="<?= $cert['id'] ?>">Sil</a>
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
document.addEventListener("DOMContentLoaded", () => {

    // --- SKILL AJAX ---
    const skillForm = document.getElementById("skillForm");
    const skillsList = document.getElementById("skillsList");

    if(skillForm && skillsList){
        skillForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(skillForm);
            await fetch("./add_skill.php", {
                method: "POST",
                body: formData
            });

            const res = await fetch("./get_skills.php");
            skillsList.innerHTML = await res.text();
            skillForm.reset();
        });

        skillsList.addEventListener("click", async (e) => {
            if(e.target.classList.contains("delete-skill")){
                e.preventDefault();
                if(!confirm("Bu yeteneği silmek istediğinize emin misiniz?")) return;
                const id = e.target.getAttribute("data-id");
                await fetch(`./delete_skill.php?id=${id}`, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                });
                const res = await fetch("./get_skills.php");
                skillsList.innerHTML = await res.text();
            }
        });
    }

    // --- EXPERIENCE AJAX ---
    const expForm = document.getElementById("expForm");
    const expList = document.getElementById("expList");

    if(expForm && expList){
        expForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(expForm);
            await fetch("./add_experience.php", {
                method: "POST",
                body: formData
            });

            const res = await fetch("./get_experiences.php");
            expList.innerHTML = await res.text();
            expForm.reset();
        });

        expList.addEventListener("click", async (e) => {
            if(e.target.classList.contains("delete-exp")){
                e.preventDefault();
                if(!confirm("Bu deneyimi silmek istediğinize emin misiniz?")) return;
                const id = e.target.getAttribute("data-id");
                await fetch(`./delete_experience.php?id=${id}`, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                });
                const res = await fetch("./get_experiences.php");
                expList.innerHTML = await res.text();
            }
        });
    }

    // --- CERTIFICATE AJAX ---
    const certForm = document.getElementById("certForm");
    const certList = document.getElementById("certList");

    if(certForm && certList){
        certForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(certForm);
            await fetch("./add_certificate.php", {
                method: "POST",
                body: formData
            });

            const res = await fetch("./get_certificates.php");
            certList.innerHTML = await res.text();
            certForm.reset();
        });

        certList.addEventListener("click", async (e) => {
            if(e.target.classList.contains("delete-cert")){
                e.preventDefault();
                if(!confirm("Bu sertifikayı silmek istediğinize emin misiniz?")) return;
                const id = e.target.getAttribute("data-id");
                await fetch(`./delete_certificate.php?id=${id}`, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                });
                const res = await fetch("./get_certificates.php");
                certList.innerHTML = await res.text();
            }
        });
    }

});
</script>