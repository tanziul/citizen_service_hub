<?php
session_start();
include '../model/db.php';

if (!isset($_SESSION['uname'])) {
    header('Location: ../../layouts/view/login.php');
    exit();
}

// Fetch citizen data
$uname = $_SESSION['uname'];
$mydb = new Model();
$conobj = $mydb->OpenCon();

$name = $email = $phone = $address = $gender = '';

if ($conobj) {
    $result = $mydb->getCitizenDetails($conobj, 'citizen', $uname);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $gender = $row['gender'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        // Retrieve updated data from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        // Update citizen data
        $result= $mydb->updateCitizenDetails($conobj, 'citizen', $uname, $name, $email, $phone, $address, $gender);

        if ($result) {
            header('Location: ../view/citizen_dashboard.php');
            exit();
        } else {
            echo "Failed to update profile.";
        }
    }
    $conobj->close();
} else {
    echo "Database connection failed.";
}
?>
