
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oğuz Kağan | Full Stack Developer</title>

    <link rel="stylesheet" href="assets/css/style.css?v=1.1">
</head>

<body>

<!-- HEADER -->
<header>
    <nav class="navbar">

        <a href="#" class="logo-container">
            <img src="assets/images/ben.jpeg" alt="Logo" class="nav-avatar">
        </a>

        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#certificates">Certificates</a></li>
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

        <img src="assets/images/ben.jpeg" alt="Profile">

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

    <div class="experience-container" id="experienceContainer">
        <!-- Experiences will be loaded here via AJAX -->
    </div>
</section>

<!-- SKILLS -->
<section class="skills" id="skills">

    <h2>Skills</h2>

    <div class="skills-container" id="skillsContainer">
        <!-- Skills will be loaded here via AJAX -->
    </div>

</section>

<!-- PROJECTS -->
<section class="projects" id="projects">

    <h2>My Projects</h2>

    <div class="projects-container" id="projectsContainer">
        <!-- Projects will be loaded here via AJAX -->
    </div>

</section>

<!-- CERTIFICATES -->
<section class="certificates" id="certificates">
    <h2>Certificates</h2>
    <div class="projects-container" id="certificatesContainer">
        <!-- Certificates will be loaded here via AJAX -->
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