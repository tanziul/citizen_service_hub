<?php
include '../model/db.php';

$mydb = new Model();
$conobj = $mydb->openCon();
$result = $mydb->showAllServiceProviders("serviceprovider", $conobj); // Use showAllServiceProviders instead of showAllUsers

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        echo "ID: " . $row["id"] . "<br>";  // Assuming column is now 'id'
        echo "Name: " . $row["name"] . "<br>";
        echo "Username: " . $row["uname"] . "<br>";
      
        echo "Service Type: " . $row["service_type"] . "<br>";
        echo "<a href='../view/edit_profile.php?id=" . $row["id"] . "'>Edit</a><br>";  // Updated 'provider_id' to 'id'
      
    }
} else {
    echo "No service providers found.";
}
?>

