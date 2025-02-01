<?php
class Model {
    function OpenCon() {
        $conn = new mysqli("localhost", "root", "", "myadmin");
        return $conn;
    }

    function AddCitizen($conn, $table, $name, $email, $uname, $password, $phone, $address, $gender) {
        $sql = "INSERT INTO $table (name, email, uname, password, phone, address, gender) 
                VALUES ('$name', '$email', '$uname', '$password', '$phone', '$address', '$gender')";
        return $conn->query($sql);
    }

    function login($conn, $table, $uname, $password) {
        $sql = "SELECT * FROM $table WHERE uname = '$uname' AND password = '$password'";
        return $conn->query($sql);
    }

    function checkUniqueEmailUsername($conn, $table, $email, $uname) {
        $sql = "SELECT * FROM $table WHERE email = '$email' OR uname = '$uname'";
        return $conn->query($sql);
    }
    function getCitizenDetails($conn, $table, $uname) {
        $sql = "SELECT * FROM $table WHERE uname = '$uname'";
        return $conn->query($sql);
    }
    function updateCitizenDetails($conn, $table, $uname, $name, $email, $phone, $address, $gender) {
        $sql = "UPDATE $table 
                SET name = '$name', email = '$email', phone = '$phone', address = '$address', gender = '$gender' 
                WHERE uname = '$uname'";
        return $conn->query($sql);
    }
    
}


?>