<?php
session_start();
include '../model/db.php';  // Include database connection

// Check if the service provider is logged in
if (!isset($_SESSION['uname'])) {
    header('Location: ../../layouts/view/login.php');
    exit();
}

// Initialize variables for the service provider
$name = '';
$email = '';
$phone = '';
$address = '';

$dob = '';
$uname = '';

// Fetch service provider data from the database
$uname = $_SESSION['uname'];
$mydb = new Model();
$conobj = $mydb->OpenCon();

if ($conobj) {
    $result = $mydb->getServiceProviderDetails($conobj, 'serviceprovider', $uname);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone_number'];
        $address = $row['address'];
        
        $dob = $row['dob'];
        $uname = $row['uname']; // Fetch uname for display purposes
    } else {
        // Redirect to login if service provider data is not found
        header('Location: ../../layouts/view/login.php');
        exit();
    }

    $conobj->close();
} else {
    echo "Database connection failed.";
    exit();
}
?>
