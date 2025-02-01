<?php
class Model {
    function OpenCon() {
        $conn = new mysqli("localhost", "root", "", "myadmin");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function AddAdmin($conn, $table, $name, $email, $uname, $password, $phone, $address, $gender, $dob) {
        $sql = "INSERT INTO $table (name, email, uname, password, phone, address, gender, dob) 
                VALUES ('$name', '$email', '$uname', '$password', '$phone', '$address', '$gender', '$dob')";
        return $conn->query($sql);
    }
    function login($conn, $table, $uname, $password) {
        $sql = "SELECT * FROM $table WHERE uname = '$uname' AND password = '$password'";
        return $conn->query($sql);
    }
    public function getAdminDetails($conobj, $table, $uname) {
        $sql = "SELECT * FROM $table WHERE uname = '$uname'";
        return $conobj->query($sql);
    }

    
    function showAllUsers($table, $conn) {
        
        $sql = "SELECT * FROM $table";
        return $conn->query($sql);
    }

  
    function deleteUserById($conn, $table, $admin_id) {
        $sql = "DELETE FROM $table WHERE admin_id = '$admin_id'";
        return $conn->query($sql);
    }

    function checkUniqueEmailUsername($conn, $table, $email, $uname) {
        $sql = "SELECT * FROM $table WHERE email = '$email' OR uname = '$uname'";
        return $conn->query($sql);
    }

    function CloseCon($conn) {
        $conn->close();
    }
}
?>