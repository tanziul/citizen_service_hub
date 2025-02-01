function validateName() {
    const name = document.getElementById("name").value.trim();
    const nameRegex = /^[a-zA-Z\s]+$/;

    if (name === "") {
        document.getElementById("nameError").innerHTML = "Name is required";
        return false;
    } else if (!nameRegex.test(name)) {
        document.getElementById("nameError").innerHTML = "Only letters and white space are allowed";
        return false;
    } else {
        document.getElementById("nameError").innerHTML = "";
        return true;
    }
}

function validateUserName() {
    const uname = document.getElementById("uname").value.trim();
    const unameRegex = /^[a-zA-Z0-9._-]{3,}$/;

    if (uname === "") {
        document.getElementById("unameError").innerHTML = "Username is required";
        return false;
    } else if (!unameRegex.test(uname)) {
        document.getElementById("unameError").innerHTML = "Only alphanumeric characters, period, dash, or underscore are allowed. Username must contain at least three characters.";
        return false;
    } else {
        document.getElementById("unameError").innerHTML = "";
        return true;
    }
}

function validateEmail() {
    const email = document.getElementById("email").value.trim();
    const emailRegex = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        return false;
    } else if (!emailRegex.test(email)) {
        document.getElementById("emailError").innerHTML = "Enter a valid email address";
        return false;
    } else {
        document.getElementById("emailError").innerHTML = "";
        return true;
    }
}

function validatePhone() {
    const phone = document.getElementById("phone_number").value.trim();

    if (phone === "") {
        document.getElementById("phoneError").innerHTML = "Phone number is required";
        return false;
    } else {
        document.getElementById("phoneError").innerHTML = "";
        return true;
    }
}

function validateAddress() {
    const address = document.getElementById("address").value.trim();
    if (address === "") {
        document.getElementById("addressError").innerHTML = "Address is required";
        return false;
    } else {
        document.getElementById("addressError").innerHTML = "";
        return true;
    }
}

function validateServiceType() {
    const checkboxes = document.querySelectorAll('input[name="service_type[]"]:checked');
    
    // Ensure at least one checkbox is selected
    if (checkboxes.length === 0) {
        document.getElementById("serviceTypeError").innerHTML = "At least one service type is required";
        return false;
    } else {
        document.getElementById("serviceTypeError").innerHTML = "";
        return true;
    }
}

function validatePassword() {
    const pass = document.getElementById("pass").value.trim();
    const specialCharRegex = /[@#$%^&*!]/;

    if (pass === "") {
        document.getElementById("passError").innerHTML = "Password is required";
        return false;
    } else if (pass.length < 6) {
        document.getElementById("passError").innerHTML = "Password must be at least 6 characters";
        return false;
    } else if (!specialCharRegex.test(pass)) {
        document.getElementById("passError").innerHTML = "Password must contain at least one special character (@, #, $, %, ^, &, *, or !)";
        return false;
    } else {
        document.getElementById("passError").innerHTML = "";
        return true;
    }
}

function validateConfirmPassword() {
    const pass = document.getElementById("pass").value.trim();
    const confirmPass = document.getElementById("confirm_password").value.trim();

    if (confirmPass === "") {
        document.getElementById("confirmPassError").innerHTML = "Please confirm your password";
        return false;
    } else if (pass !== confirmPass) {
        document.getElementById("confirmPassError").innerHTML = "Passwords do not match";
        return false;
    } else {
        document.getElementById("confirmPassError").innerHTML = "";
        return true;
    }
}

function validation() {
    let isValid = true;

    if (!validateName()) isValid = false;
    if (!validateUserName()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validatePhone()) isValid = false;
    if (!validateAddress()) isValid = false;
    if (!validateServiceType()) isValid = false;
    if (!validatePassword()) isValid = false;
    if (!validateConfirmPassword()) isValid = false;

    return isValid;
}
