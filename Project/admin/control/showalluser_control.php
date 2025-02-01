<?php
include '../model/db.php';
session_start();

$mydb = new Model();
$conobj = $mydb->OpenCon();
$result = $mydb->showAllUsers("admin", $conobj);

if ($result->num_rows > 0) {
    // Loop through results
    foreach ($result as $row) {
        echo "Admin ID: " . $row["admin_id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Username: " . $row["uname"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "DOB: " . $row["dob"] . "<br>";

        // Add Delete action link
        echo '<a href="../control/deleteuser_control.php?id=' . $row["admin_id"] . '">Delete</a>';
        echo "<br><hr>";

    }
    

    
} else {
    echo "No users found";
}