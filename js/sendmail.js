
document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        subject: document.getElementById("subject").value,
        message: document.getElementById("message").value,
    };

    emailjs.send("service_dzpgxgo", "template_wb82c4t", params)
        .then(function(response) {
            alert("Email Sent Successfully");
            console.log('SUCCESS!', response.status, response.text);
            document.getElementById('contact-form').reset(); // Reset the form
        }, function(error) {
            alert("Failed to send email. Please try again later.");
            console.log('FAILED...', error);
        });
});
