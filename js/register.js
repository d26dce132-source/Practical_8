const form = document.getElementById("registrationForm");

form.addEventListener("submit", function(event) {

    let valid = true;

    // Clear errors
    document.querySelectorAll(".error").forEach(function(error) {
        error.textContent = "";
    });


    // NAME
    const name = document.getElementById("name").value.trim();

    const nameRegex = /^[A-Za-z ]{2,50}$/;

    if (!nameRegex.test(name)) {

        document.getElementById("nameError").textContent =
            "Enter a valid name.";

        valid = false;
    }


    // EMAIL
    const email = document.getElementById("email").value.trim();

    const emailRegex =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {

        document.getElementById("emailError").textContent =
            "Enter a valid email.";

        valid = false;
    }


    // MOBILE
    const mobile = document.getElementById("mobile").value.trim();

    const mobileRegex = /^[0-9]{10}$/;

    if (!mobileRegex.test(mobile)) {

        document.getElementById("mobileError").textContent =
            "Enter a valid 10 digit mobile number.";

        valid = false;
    }


    // PASSWORD
    const password =
        document.getElementById("password").value;

    if (password.length < 6) {

        document.getElementById("passwordError").textContent =
            "Password must contain at least 6 characters.";

        valid = false;
    }


    // CONFIRM PASSWORD
    const confirmPassword =
        document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {

        document.getElementById("confirmPasswordError").textContent =
            "Passwords do not match.";

        valid = false;
    }


    // COURSE
    const course =
        document.getElementById("course").value;

    if (course === "") {

        document.getElementById("courseError").textContent =
            "Please select a course.";

        valid = false;
    }


    // YEAR
    const year =
        document.getElementById("year").value;

    if (year === "") {

        document.getElementById("yearError").textContent =
            "Please select a year.";

        valid = false;
    }


    // GENDER
    const gender =
        document.querySelector('input[name="gender"]:checked');

    if (!gender) {

        document.getElementById("genderError").textContent =
            "Please select gender.";

        valid = false;
    }


    // TERMS
    const terms =
        document.getElementById("terms").checked;

    if (!terms) {

        document.getElementById("termsError").textContent =
            "You must accept the terms.";

        valid = false;
    }


    // STOP SUBMISSION IF VALIDATION FAILS
    if (!valid) {

        event.preventDefault();

        return;
    }

    /*
       IMPORTANT:
       We do NOT use event.preventDefault()
       when everything is valid.

       Therefore the form will go to:

       ../php/register.php

       and PHP will insert the data into MySQL.
    */

});