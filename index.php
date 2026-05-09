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

            <div class="logo">
                OĞUZ KAĞAN
            </div>

            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <button id="darkModeToggle">
                🌙
            </button>

        </nav>
    </header>

    <!-- HERO -->
    <section class="hero" id="home">

        <div class="hero-content">

            <h1>
                Full Stack Developer
            </h1>

            <p>
                I create modern, responsive and dynamic full-stack web applications using HTML, CSS, JavaScript, PHP and MySQL.
            </p>

            <a href="#projects" class="btn">
                View Projects
            </a>

        </div>

    </section>

    <!-- ABOUT -->
    <section class="about" id="about">

        <h2>About Me</h2>

        <p>
            I am a passionate software developer focused on building modern web applications and improving user experiences with clean and efficient code.
        </p>

    </section>

    <!-- SKILLS -->
    <section class="skills" id="skills">

        <h2>Skills</h2>

        <div class="skills-container">

            <div class="skill-card">
                HTML5
            </div>

            <div class="skill-card">
                CSS3
            </div>

            <div class="skill-card">
                JavaScript
            </div>

            <div class="skill-card">
                PHP
            </div>

            <div class="skill-card">
                MySQL
            </div>

        </div>

    </section>

    <!-- PROJECTS -->
    <section class="projects" id="projects">

        <h2>Projects</h2>

        <div class="project-container">

            <article class="project-card">

                <h3>Cargo Tracking System</h3>

                <p>
                    Full-stack cargo tracking application developed with PHP and MySQL.
                </p>

            </article>

            <article class="project-card">

                <h3>Task Management System</h3>

                <p>
                    Dynamic task management application with authentication system.
                </p>

            </article>

        </div>

    </section>

    <!-- CONTACT -->
    <section class="contact" id="contact">

        <h2>Contact Me</h2>

        <form id="contactForm">

            <input type="text" id="name" placeholder="Your Name">

            <input type="email" id="email" placeholder="Your Email">

            <textarea id="message" placeholder="Your Message"></textarea>

            <button type="submit">
                Send Message
            </button>

        </form>

    </section>

    <!-- FOOTER -->
    <footer>

        <p>
            © 2026 Oğuz Kağan Portfolio
        </p>

    </footer>

    <script src="assets/js/app.js"></script>

</body>
</html>