<?php
include '../model/db.php';

$mydb = new Model();
$conobj = $mydb->OpenCon();

if (isset($_GET['id'])) {
    $provider_id = $_GET['id'];
    $result = $mydb->getServiceProviderById($conobj, "serviceprovider", $provide_id);

    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $name = $row["name"];
            $email = $row["email"];
            $phone_number = $row["phone_number"];
            $address = $row["address"];
         
            $service_type = explode(", ", $row["service_type"]);
            $uname = $row["uname"];
            $password = $row["password"];
        }
    }
}

if (isset($_POST["update"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
  
    $service_type = implode(", ", $_POST["service_type"]);
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    $result = $mydb->updateServiceProviderById($conobj, "serviceProvider", $provider_id, $name, $email, $phone_number, $address, $uname, $password,$service_type);

    if ($result) {
        echo "Profile updated successfully.";
    } else {
        echo "Failed to update profile.";
    }
}
?>
