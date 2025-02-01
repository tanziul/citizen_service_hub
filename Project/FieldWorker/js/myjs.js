// JavaScript Validation for Name
function validateName() {
    const name = document.getElementById("name").value.trim();
    const nameRegex = /^[a-zA-Z ]*$/;

    if (name === "") {
        document.getElementById("nameError").innerHTML = "Name is required";
        return false;
    } else if (!nameRegex.test(name)) {
        document.getElementById("nameError").innerHTML = "Only letters and white space allowed";
        return false;
    } else {
        document.getElementById("nameError").innerHTML = "";
        return true;
    }
}

// JavaScript Validation for Username
function validateUserName() {
    const username = document.getElementById("uname").value.trim();
    const usernameRegex = /^[a-zA-Z0-9]*$/;

    if (username === "") {
        document.getElementById("unameError").innerHTML = "Username is required";
        return false;
    } else if (!usernameRegex.test(username)) {
        document.getElementById("unameError").innerHTML = "Only letters and numbers allowed";
        return false;
    } else {
        document.getElementById("unameError").innerHTML = "";
        return true;
    }
}

// JavaScript Validation for Email
function validateEmail() {
    const email = document.getElementById("email").value.trim();
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        return false;
    } else if (!emailRegex.test(email)) {
        document.getElementById("emailError").innerHTML = "Invalid email format";
        return false;
    } else {
        document.getElementById("emailError").innerHTML = "";
        return true;
    }
}


function validatePassword() {
    const pass = document.getElementById("pass").value.trim();
    const specialCharRegex = /[@#$%^&*!]/;  // Added special character check
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

// JavaScript Validation for Phone
function validatePhone() {
    const phone = document.getElementById("phone").value.trim();
  

    if (phone === "") {
        document.getElementById("phoneError").innerHTML = "Phone number is required";
        return false;
    } 
    else {
        document.getElementById("phoneError").innerHTML = "";
        return true;
    }
}

// JavaScript Validation for Date of Birth
function validateDob() {
    const dob = document.getElementById("dob").value.trim();
    const dobRegex = /^\d{4}-\d{2}-\d{2}$/;

    if (dob === "") {
        document.getElementById("dobError").innerHTML = "Date of Birth is required";
        return false;
    } else if (!dobRegex.test(dob)) {
        document.getElementById("dobError").innerHTML = "Please enter a valid date format (YYYY-MM-DD)";
        return false;
    } else {
        document.getElementById("dobError").innerHTML = "";
        return true;
    }
}



// JavaScript Validation for Address
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

// JavaScript Validation for Previous Employer
function validatePreEmployer() {
    const preEmployer = document.getElementById("pre_employer").value.trim();
    if (preEmployer === "") {
        document.getElementById("preEmployerError").innerHTML = "Previous employer name is required";
        return false;
    } else {
        document.getElementById("preEmployerError").innerHTML = "";
        return true;
    }
}

// JavaScript Validation for Job Title
function validateJobTitle() {
    const jobTitle = document.getElementById("job_title").value.trim();
    if (jobTitle === "") {
        document.getElementById("jobTitleError").innerHTML = "Job title is required";
        return false;
    } else {
        document.getElementById("jobTitleError").innerHTML = "";
        return true;
    }
}

// JavaScript Validation for Job Responsibility
function validateJobResponsibility() {
    const jobResponsibility = document.getElementById("job_responsibility").value.trim();
    if (jobResponsibility === "") {
        document.getElementById("jobResponsibilityError").innerHTML = "Job responsibility is required";
        return false;
    } else {
        document.getElementById("jobResponsibilityError").innerHTML = "";
        return true;
    }
}
// JavaScript Validation for Skills
function validateSkills() {
    const checkboxes = document.querySelectorAll('input[name="skills[]"]:checked');
    
    // Ensure at least one checkbox is selected
    if (checkboxes.length === 0) {
        document.getElementById("skillsError").innerHTML = "At least one skill is required";
        return false;
    } else {
        document.getElementById("skillsError").innerHTML = "";
        return true;
    }
}


// Main Validation Function
function validation() {
   
    let isValid = true;
  

    if (!validateName()) isValid = false;
    if (!validateUserName()) isValid = false;
    if (!validatePassword()) isValid = false;
    if (!validateConfirmPassword()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validatePhone()) isValid = false;
    if (!validateAddress()) isValid = false;
    if (!validateDob()) isValid = false;
    if (!validatePreEmployer()) isValid = false;
    if (!validateJobTitle()) isValid = false;
    if (!validateJobResponsibility()) isValid = false;
    if (!validateSkills()) isValid = false;

    return isValid;
}
