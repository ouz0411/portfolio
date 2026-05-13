// DARK MODE
const darkModeToggle = document.getElementById("darkModeToggle");

darkModeToggle.addEventListener("click", () => {
    document.body.classList.toggle("light-mode");
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