// DARK MODE PERSISTENCE
const darkModeToggle = document.getElementById("darkModeToggle");
const currentTheme = localStorage.getItem("theme");
if (currentTheme === "light") {
    document.body.classList.add("light-mode");
    darkModeToggle.innerHTML = "☀️";
}

darkModeToggle.addEventListener("click", () => {
    document.body.classList.toggle("light-mode");
    
    // Toggle icon and Save preference
    if(document.body.classList.contains("light-mode")){
        darkModeToggle.innerHTML = "☀️";
        localStorage.setItem("theme", "light");
    } else {
        darkModeToggle.innerHTML = "🌙";
        localStorage.setItem("theme", "dark");
    }
});

// CONTACT FORM AJAX
const contactForm = document.getElementById("contactForm");

if (contactForm) {

    contactForm.addEventListener("submit", async (e) => {

        e.preventDefault();

        const formData = new FormData(contactForm);

        const response = await fetch("send_message.php", {
            method: "POST",
            body: formData
        });

        const result = await response.text();

        const formMessage = document.getElementById("formMessage");

        if (result === "success") {

            formMessage.innerHTML =
                "✅ Message sent successfully!";

            formMessage.style.color = "#38bdf8";

            contactForm.reset();

        } else {

            formMessage.innerHTML =
                "❌ Something went wrong.";

            formMessage.style.color = "red";
        }

    });

}

// FETCH DATA VIA AJAX
async function fetchData() {
    try {
        const response = await fetch("api.php?t=" + new Date().getTime());
        const data = await response.json();
        console.log("Data fetched:", data);

        // 1. Render Experiences
        const expContainer = document.getElementById("experienceContainer");
        if (expContainer && data.experiences) {
            let expHTML = "";
            data.experiences.forEach(exp => {
                expHTML += `
                    <div class="experience-card">
                        <h3>${exp.company}</h3>
                        <span>${exp.role}</span>
                        <p>${exp.desc}</p>
                    </div>
                `;
            });
            expContainer.innerHTML = expHTML;
        }

        // 2. Render Skills
        const skillsContainer = document.getElementById("skillsContainer");
        if (skillsContainer && data.skills) {
            let skillsHTML = "";
            data.skills.forEach(skill => {
                skillsHTML += `
                    <div class="skill-card">
                        ${skill.name}
                    </div>
                `;
            });
            skillsContainer.innerHTML = skillsHTML;
        }
        // 3. Render Projects
        const projectsContainer = document.getElementById("projectsContainer");
        if (projectsContainer && data.projects) {
            let projectsHTML = "";
            if (data.projects.length > 0) {
                data.projects.forEach(project => {
                    let linkHTML = "";
                    if (project.github_link) {
                        linkHTML = `<a href="${project.github_link}" target="_blank">View Project →</a>`;
                    }
                    projectsHTML += `
                        <div class="project-card">
                            <h3>${project.title}</h3>
                            <p>${project.description}</p>
                            ${linkHTML}
                        </div>
                    `;
                });
            } else {
                projectsHTML = "<p>No projects found.</p>";
            }
            projectsContainer.innerHTML = projectsHTML;
        }

        // 4. Render Certificates
        const certContainer = document.getElementById("certificatesContainer");
        if (certContainer && data.certificates) {
            let certHTML = "";
            data.certificates.forEach(cert => {
                certHTML += `
                    <div class="project-card">
                        <h3>${cert.title}</h3>
                        <p>${cert.organization} (${cert.issue_date})</p>
                    </div>
                `;
            });
            certContainer.innerHTML = certHTML;
        }
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

// Initial load
document.addEventListener("DOMContentLoaded", () => {
    fetchData();
    
    // Auto-refresh every 5 seconds to show changes from admin panel without refresh
    setInterval(fetchData, 5000);
});