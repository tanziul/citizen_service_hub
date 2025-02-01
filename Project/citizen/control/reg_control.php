<?php
include '../model/db.php';
session_start();

$nameErr = $emailErr = $unameErr = $passwordErr = $confirmPasswordErr = $phoneErr = $addressErr = $genderErr = "";
$name = $email = $uname = $password = $confirmPassword = $phone = $address = $gender = "";
$hasError = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name validation
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

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $hasError = 1;
    } else {
        $email = $_POST["email"];
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
            $emailErr = "Invalid email format";
            $hasError = 1;
        }
    }

    // Username validation
    if (empty($_POST["uname"])) {
        $unameErr = "Username is required";
        $hasError = 1;
    } else {
        $uname = $_POST["uname"];
        if (!preg_match("/^[a-zA-Z0-9._-]+$/", $uname)) {
            $unameErr = "Only alphanumeric characters, period, dash, or underscore are allowed";
            $hasError = 1;
        } elseif (strlen($uname) < 3) {
            $unameErr = "Username must contain at least three characters";
            $hasError = 1;
        }
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $hasError = 1;
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters";
            $hasError = 1;
        } elseif (!preg_match("/[@#$%^&*!]/", $password)) {
            $passwordErr = "Password must contain at least one special character (@, #, $, %, ^, &, *, or !)";
            $hasError = 1;
        }
    }

    // Confirm password validation
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

    // Phone validation
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $hasError = 1;
    } else {
        $phone = $_POST["phone"];
    }

    // Address validation
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $hasError = 1;
    } else {
        $address = $_POST["address"];
    }

    // Gender validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $hasError = 1;
    } else {
        $gender = $_POST["gender"];
    }

    // If no errors, proceed with registration
    if ($hasError == 0) {
        $mydb = new Model();
        $conobj = $mydb->OpenCon();
        $checkResult = $mydb->checkUniqueEmailUsername($conobj, "citizen", $email, $uname);
        
        if ($checkResult->num_rows > 0) {
            echo "Email or Username already exists. Please try again with different credentials.";
            $hasError = 1;
        } else {
            $result = $mydb->AddCitizen($conobj, "citizen", $name, $email, $uname, $password, $phone, $address, $gender);

            if ($result === TRUE) {
              
                header("Location: ../../layouts/view/login.php");
            } else {
                echo "Error: " . $conobj->error;
            }
        }
    }
}
?>
