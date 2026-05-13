<?php
require_once "includes/db.php";

$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll();
$skillStmt = $pdo->query("SELECT * FROM skills ORDER BY id DESC");
$skills = $skillStmt->fetchAll();
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

        <a href="#" class="logo-container">
            <img src="assets/images/profile.png" alt="Logo" class="nav-avatar">
        </a>

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

    <div class="hero-overlay"></div>

    <div class="hero-content">
    <div class="hero-image">

        <img src="assets/images/profile.png" alt="Profile">

    </div>

        <p class="hero-tag">
            👋 Hello, I'm
        </p>

        <h1>
            Oğuz Kağan Kabadayı
        </h1>

        <h2>
            Full Stack Developer
        </h2>

        <p class="hero-description">
            I build modern, responsive and dynamic full-stack web applications
            using PHP, MySQL, JavaScript and modern web technologies.
        </p>

        <div class="hero-buttons">

            <a href="#projects" class="btn">
                View Projects
            </a>

            <a href="#contact" class="btn btn-outline">
                Contact Me
            </a>

        </div>

    </div>

</section>

<!-- ABOUT -->
<section class="about" id="about">
    <h2>About Me</h2>
    <p>
       I am a 3rd-year Software Engineering student at Haliç University who is passionate about web development and modern technologies. I enjoy building responsive and user-friendly web applications while continuously improving my technical and problem-solving skills through real-world projects and hands-on experience.
    </p>

    <div class="experience-container">
        <?php
        $experiences = [
            [
                "company" => "BETİLSOFT",
                "role" => "Software Development Intern (2025)",
                "desc" => "Worked on full-stack web development projects using Angular, ASP.NET Web API and MySQL."
            ],
            [
             "company" => "FORMEX",
             "role" => "part time reportman (2024-2025)",
             "desc" => "Responsible for reporting and organizing delivery notes and shipment documents received from different companies while ensuring accurate data tracking and workflow management"
            ]

        ];

        foreach ($experiences as $exp) {
            echo '<div class="experience-card">';
            echo '    <h3>' . $exp['company'] . '</h3>';
            echo '    <span>' . $exp['role'] . '</span>';
            echo '    <p>' . $exp['desc'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<!-- SKILLS -->
<section class="skills" id="skills">

    <h2>Skills</h2>

    <div class="skills-container">

    <?php foreach($skills as $skill): ?>

        <div class="skill-card">

            <?= htmlspecialchars($skill["name"]) ?>

        </div>

    <?php endforeach; ?>

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

    <form id="contactForm">

        <input type="text"
               name="name"
               placeholder="Your Name"
               required>

        <input type="email"
               name="email"
               placeholder="Your Email"
               required>

        <textarea name="message"
                  placeholder="Your Message"
                  required></textarea>

        <button type="submit">
            Send Message
        </button>

    </form>

    <p id="formMessage"></p>

</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 Oğuz Kağan Portfolio</p>
</footer>

<script src="assets/js/app.js"></script>

</body>
</html>