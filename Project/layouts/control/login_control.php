<?php
session_start();
include '../../citizen/model/db.php';
//include '../../admin/model/db.php';
//include '../../ServiceProvider/model/db.php';

if (isset($_POST['login'])) {
    $uname = $_POST["uname"];
    $pass = $_POST["password"];

    $mydb = new Model();
    $conobj = $mydb->OpenCon(); 

    // First check if the user is a citizen
    $citizenResult = $mydb->login($conobj, "citizen", $uname, $pass);

    if ($citizenResult->num_rows > 0) {
        // If citizen credentials match
        $row = $citizenResult->fetch_assoc();
        $_SESSION["uname"] = $row["uname"];
        header('Location: ../../citizen/view/citizen_dashboard.php');
        exit();
    } else {
        // If citizen login fails, check for admin credentials
        $adminResult = $mydb->login($conobj, "admin", $uname, $pass);
        
        if ($adminResult->num_rows > 0) {
            // If admin credentials match
            $row = $adminResult->fetch_assoc();
            $_SESSION["uname"] = $row["uname"];
            header('Location: ../../admin/view/admin_dashboard.php');
            exit();
        } else {
            // If admin login fails, check for service provider credentials
            $providerResult = $mydb->login($conobj, "serviceprovider", $uname, $pass);

            if ($providerResult->num_rows > 0) {
                // If service provider credentials match
                $row = $providerResult->fetch_assoc();
                $_SESSION["uname"] = $row["uname"];
                header('Location: ../../ServiceProvider/view/provider_dashboard.php');
                exit();
            } else {
                // If all logins fail
                echo "Invalid credentials";
            }
        }
    }
}
?>


