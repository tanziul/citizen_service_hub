<?php
session_start();
include '../model/db.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['uname'])) {
    header('Location: ../../layouts/view/login.php');
    exit();
}

// Initialize variables
$name = '';
$email = '';
$phone = '';
$address = '';
$gender = '';
$dob='';
$uname = '';

// Fetch admin data from the database
$uname = $_SESSION['uname'];
$mydb = new Model();
$conobj = $mydb->OpenCon();

if ($conobj) {
    $result = $mydb->getAdminDetails($conobj, 'admin', $uname);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $gender = $row['gender'];
        $dob=$row['dob'];
        $uname = $row['uname']; // Fetch uname for display purposes
    } else {
        // Redirect to login if admin data is not found
        header('Location: ../../layouts/view/login.php');
        exit();
    }

    $conobj->close();
} else {
    echo "Database connection failed.";
    exit();
}
?>
