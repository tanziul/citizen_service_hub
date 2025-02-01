<?php
class Model {
    function OpenCon() {
        $conn = new mysqli("localhost", "root", "", "myadmin");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function AddServiceProvider($conn, $table, $name, $email, $uname, $password, $phone_number, $address,$service_type) 
    {
      
    
        $sql = "INSERT INTO $table (name, email, uname, password, phone_number, address,service_type) 
                VALUES ('$name', '$email', '$uname', '$password', '$phone_number', '$address','$service_type')";
        return $conn->query($sql);
    }

    function getServiceProviderDetails($conn, $table, $uname) {
        $sql = "SELECT * FROM $table WHERE uname = '$uname'";
        return $conn->query($sql);
    }
    function showAllServiceProviders($table, $connobject) {
        $sql = "SELECT * FROM $table";
        $result = $connobject->query($sql);
        return $result;
    }
    
    function getServiceProviderById($connobject, $table, $id) {
        $sql = "SELECT * FROM $table WHERE id = '$id'";
        $result = $connobject->query($sql);
        return $result;
    }
    
    function updateServiceProviderById($connobject, $table, $id, $name, $email, $uname, $password, $phone_number, $address,$service_type) {
        $sql = "UPDATE $table SET name='$name', email='$email', phone_number='$phone_number', address='$address',service_type='$service_type', uname='$uname', password='$password' WHERE id='$id'";
        return $connobject->query($sql);
    }

    function checkUniqueEmailAndUsername($conn, $table, $email, $uname) {
        $sql = "SELECT * FROM $table WHERE email = '$email' OR uname = '$uname'";
        return $conn->query($sql);
    }
    

    function CloseCon($conn) {
        $conn->close();
    }
}
?>
