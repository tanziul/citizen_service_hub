<?php
include '../model/db.php';
session_start();


$nameErr = $emailErr = $unameErr = $passwordErr = $confirmPasswordErr = $phoneErr = $addressErr = $genderErr = $dobErr = "";
$name = $email = $uname = $password = $confirmPassword = $phone = $address = $gender = $dob = "";
$hasError = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation for Full Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $hasError = 1;
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $hasError = 1;
        }
    }

    // Validation for Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $hasError = 1;
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $hasError = 1;
        }
    }

    if (empty($_POST["uname"])) {
        $unameErr = "Username is required";
        $hasError = 1;
    } else {
        $uname = $_POST["uname"];
        if (!preg_match("/^[a-zA-Z0-9._-]{3,}$/", $uname)) {
            $usernameErr = "Username must contain at least three characters and only alphanumeric characters, period, dash, or underscore are allowed.";
            $hasError = 1;
        }
    }

// Validation for Password
if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $hasError = 1;
} else {
    $password = $_POST["password"];
    if (strlen($password) < 6) {
        $passwordErr = "Password must be at least 6 characters long";
        $hasError = 1;
    } elseif (!preg_match("/[@#$%^&*!]/", $password)) {
        $passwordErr = "Password must contain at least one special character (@, #, $, %, ^, &, *, !)";
        $hasError = 1;
    }
}


    // Validation for Confirm Password
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Please confirm your password";
        $hasError = 1;
    } else {
        $confirmPassword = $_POST["confirm_password"];
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match";
            $hasError = 1;
        }
    }

    // Validation for Phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $hasError = 1;
    } else {
        $phone = $_POST["phone"];
  
        }
    

    // Validation for Address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $hasError = 1;
    } else {
        $address = $_POST["address"];
    }

    // Validation for Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $hasError = 1;
    } else {
        $gender = $_POST["gender"];
    }

    // Validation for Date of Birth
    if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
        $hasError = 1;
    } else {
        $dob = $_POST["dob"];
    }

    // Database operations
    if ($hasError == 0) {
        $mydb = new Model();
        $conobj = $mydb->OpenCon();
        $checkResult = $mydb->checkUniqueEmailUsername($conobj, "admin", $email, $uname);
        
        if ($checkResult->num_rows > 0) {
            echo "Email or Username already exists. Please try again with different credentials.";
            $hasError = 1;
        } else {
            // Proceed to register the user if no error
            $result = $mydb->AddAdmin($conobj, "admin", $name, $email, $uname, $password, $phone, $address, $gender, $dob);

            if ($result === TRUE) {
                header("Location: ../../layouts/view/login.php");
            } else {
                echo "Error: " . $conobj->error;
            }
        }
        $mydb->CloseCon($conobj);
    }
}
?>
