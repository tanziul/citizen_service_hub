<?php
include '../model/db.php';
session_start();

$name = $email = $phn_num = $dob  = $address = $password = $confirmPassword = $uname = "";
$pre_employer = $job_title  = $job_responsibility =  "";
$skills = [];

$nameErr = $emailErr = $phn_numErr = $dobErr  = $addressErr = $passwordErr = $confirmPasswordErr = $unameErr = "";
$pre_employerErr = $job_titleErr = $job_responsibilityErr = $skillsErr = "";
$hasError = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Full Name Validation: Only letters and white spaces allowed
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $hasError = 1;
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
            $nameErr = "Only letters and white spaces are allowed in Name";
            $hasError = 1;
        }
    }

    // Email Validation
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

    // Phone Number Validation
    if (empty($_POST["phn_num"])) {
        $phn_numErr = "Phone number is required";
        $hasError = 1;
    } else {
        $phn_num = $_POST["phn_num"];
    }

    // Username Validation: Alphanumeric and at least 3 characters
    if (empty($_POST["uname"])) {
        $unameErr = "Username is required";
        $hasError = 1;
    } else {
        $uname = $_POST["uname"];
        if (!preg_match("/^[a-zA-Z0-9]{3,}$/", $uname)) {
            $unameErr = "Username must be alphanumeric and at least 3 characters long";
            $hasError = 1;
        }
    }

    // Date of Birth Validation
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
        $hasError = 1;
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["dob"])) {
        $dobErr = "Please enter a valid date format (YYYY-MM-DD)";
        $hasError = 1;
    } else {
        $dob = $_POST["dob"];
    }


    // Address Validation
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $hasError = 1;
    } else {
        $address = $_POST["address"];
    }

    // Previous Employer Validation
    if (empty($_POST["pre_employer"])) {
        $pre_employerErr = "Previous employer name is required";
        $hasError = 1;
    } else {
        $pre_employer = $_POST["pre_employer"];
    }

    // Job Title Validation
    if (empty($_POST["job_title"])) {
        $job_titleErr = "Job title is required";
        $hasError = 1;
    } else {
        $job_title = $_POST["job_title"];
    }

    // Job Responsibility Validation
    if (empty($_POST["job_responsibility"])) {
        $job_responsibilityErr = "Job responsibility is required";
        $hasError = 1;
    } else {
        $job_responsibility = $_POST["job_responsibility"];
    }


    if (empty($_POST["skills"])) {
        $skillsErr = "At least one skill is required";
        $hasError = 1;
    } else {
        $skills = $_POST["skills"];
    }
    /* Skills Validation (At least one skill is required)
    if (isset($_POST["skills"]) && !empty($_POST["skills"])) {
        $skills = is_array($_POST["skills"]) ? $_POST["skills"] : explode(", ", $_POST["skills"]);
    } else {
        $skillsErr = "At least one skill is required";  
        $hasError = 1;  
    }
*/
    // Password Validation: At least 6 characters and a special character
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $hasError = 1;
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $passwordErr = "Password must contain at least 6 characters";
            $hasError = 1;
        } elseif (!preg_match("/[@#$%]/", $password)) {
            $passwordErr = "Password must contain at least one special character (@, #, $, %)";
            $hasError = 1;
        }
    }

    // If no errors, proceed with database insertion
    if ($hasError == 0) {
        $mydb = new Model();
        $conobj = $mydb->OpenCon();
        $skillsString = implode(", ", $skills); // Skills as CSV string
        $checkResult = $mydb->checkUniqueEmailUsername($conobj, "fieldWorker", $email, $uname);

        if ($checkResult->num_rows > 0) { // Changed 'num_row' to 'num_rows'
            echo "Email Or username  Already exists";
            $hasError = 1;
        } else {
            $result = $mydb->AddFieldworker($conobj, "fieldworker", $name, $email, $phn_num, $dob,  $address, $pre_employer, $job_title, $job_responsibility, $skillsString, $uname, $password);

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
