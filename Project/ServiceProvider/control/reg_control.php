<?php
include '../model/db.php';
session_start();

$name = $email = $uname = $phone_number = $address = $password = $confirmPassword = "";
$service_type = [];

$nameErr = $emailErr = $unameErr = $phone_numberErr = $addressErr = $service_typeErr = $passwordErr = $confirmPasswordErr = "";
$hasError = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
            $emailErr = "Invalid email format";
            $hasError = 1;
        }
    }

    // Username Validation
    if (empty($_POST["uname"])) {
        $unameErr = "Username is required";
        $hasError = 1;
    } else {
        $uname = $_POST["uname"];
        if (!preg_match("/^[a-zA-Z0-9._-]{3,}$/", $uname)) {
            $unameErr = "Username must contain at least three characters and only alphanumeric characters, period, dash, or underscore are allowed.";
            $hasError = 1;
        }
    }

    // Phone Number Validation
    if (empty($_POST["phone_number"])) {
        $phone_numberErr = "Phone number is required";
        $hasError = 1;
    } else {
        $phone_number = $_POST["phone_number"];
    }



    // Address Validation
    $address = $_POST["address"] ?? "";
    if (empty($address)) {
        $addressErr = "Address is required";
        $hasError = 1;
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


    // Confirm password validation
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "confirm your password";
        $hasError = 1;
    } else {
        $confirmPassword = $_POST["confirm_password"];
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match";
            $hasError = 1;
        }
    }
    //Service Type validation
    if (empty($_POST["service_type"])) {
        $service_typeErr= "At least one service type is required";
        $hasError = 1;
    } else {
        $service_type = $_POST["service_type"];
    }
    // If no errors, proceed with database insert
    if ($hasError == 0) {
        $mydb = new Model();
        $conobj = $mydb->OpenCon();
        $service_typeString = implode(", ", $service_type);
        $checkResult = $mydb->checkUniqueEmailAndUsername($conobj, "serviceprovider", $email, $uname);

        if ($checkResult->num_rows > 0) {
            echo "Email or Username already exists";
            $hasError = 1;
        } else {
            // Prepare the service types as a CSV string
         

            // Insert the new service provider record into the database
            $result = $mydb->AddServiceProvider($conobj, "serviceprovider", $name, $email, $uname, $password, $phone_number, $address,$service_typeString );

            if ($result === TRUE) {
                
                

                header("Location: ../../layouts/view/login.php");
                exit();
            } else {
                echo "Error: " . $conobj->error;
            }
        }
    }
}
?>
