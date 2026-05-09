<?php
require_once "includes/db.php";

$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oğuz Kağan | Full Stack Developer</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- HEADER -->
<header>
    <nav class="navbar">

        <div class="logo">OĞUZ KAĞAN</div>

        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <button id="darkModeToggle">🌙</button>

    </nav>
</header>

<!-- HERO -->
<section class="hero" id="home">

    <div class="hero-content">
        <h1>Full Stack Developer</h1>

        <p>
            I create modern, responsive and dynamic full-stack web applications using HTML, CSS, JavaScript, PHP and MySQL.
        </p>

        <a href="#projects" class="btn">View Projects</a>
    </div>

</section>

<!-- ABOUT -->
<section class="about" id="about">

    <h2>About Me</h2>

    <p>
        I am a passionate software developer focused on building modern web applications and improving user experience with clean code.
    </p>

</section>

<!-- SKILLS -->
<section class="skills" id="skills">

    <h2>Skills</h2>

    <div class="skills-container">
        <div class="skill-card">HTML5</div>
        <div class="skill-card">CSS3</div>
        <div class="skill-card">JavaScript</div>
        <div class="skill-card">PHP</div>
        <div class="skill-card">MySQL</div>
    </div>

</section>

<!-- PROJECTS -->
<section class="projects" id="projects">

    <h2>My Projects</h2>

    <div class="projects-container">

        <?php if (!empty($projects)): ?>

            <?php foreach ($projects as $project): ?>
                <div class="project-card">

                    <h3>
                        <?= htmlspecialchars($project["title"]) ?>
                    </h3>

                    <p>
                        <?= htmlspecialchars($project["description"]) ?>
                    </p>

                    <?php if (!empty($project["github_link"])): ?>
                        <a href="<?= htmlspecialchars($project["github_link"]) ?>" target="_blank">
                            View Project →
                        </a>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <p>No projects found.</p>
        <?php endif; ?>

    </div>

</section>

<!-- CONTACT -->
<section class="contact" id="contact">

    <h2>Contact Me</h2>

    <form id="contactForm" action="send_message.php" method="POST">

        <input type="text" name="name" placeholder="Your Name" required>

        <input type="email" name="email" placeholder="Your Email" required>

        <textarea name="message" placeholder="Your Message" required></textarea>

        <button type="submit">Send Message</button>

    </form>

</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 Oğuz Kağan Portfolio</p>
</footer>

<script src="assets/js/app.js"></script>

</body>
</html>