<?php
session_start();
include '../model/db.php';

if (!isset($_SESSION['uname'])) {
    header('Location: ../../layouts/view/login.php');
    exit();
}

// Fetch admin data
$uname = $_SESSION['uname'];
$mydb = new Model();
$conobj = $mydb->OpenCon();

$name = $email = $phone = $address = $gender =$dob= '';

if ($conobj) {
    $result = $mydb->getAdminDetails($conobj, 'admin', $uname);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $gender = $row['gender'];
        $dob = $row['dob'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        // Retrieve updated data from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $row['dob'];

        // Update admin data
        $result= $mydb->getAdminDetails($conobj, 'admin', $uname, $name, $email, $phone, $address, $gender,$dob);

        if ($result) {
            header('Location: ../view/admin_dashboard.php');
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
