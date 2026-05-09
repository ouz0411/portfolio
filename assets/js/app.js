const contactForm = document.getElementById("contactForm");

if (contactForm) {

    contactForm.addEventListener("submit", (e) => {

        const formData = new FormData(contactForm);

        const name = formData.get("name");
        const email = formData.get("email");
        const message = formData.get("message");

        if (!name || !email || !message) {
            e.preventDefault();
            alert("Please fill all fields!");
        }

    });

}