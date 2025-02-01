<?php
class Model {
    function OpenCon() {
        $conn = new mysqli("localhost", "root", "", "myadmin");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function AddFieldworker($conn, $table, $name, $email, $phn_num, $dob, $address, $pre_employer, $job_title, $job_responsibility, $skills,$uname, $password)
     {
        $sql = "INSERT INTO $table (name, email, phn_num, dob, address, pre_employer, job_title, job_responsibility, skills,uname, password) 
                VALUES ('$name', '$email', '$phn_num', '$dob', '$address', '$pre_employer', '$job_title', '$job_responsibility', '$skills', '$uname','$password')";
        return $conn->query($sql);
    }
    function checkUniqueEmailUsername($conn, $table, $email, $uname) {
        $sql = "SELECT * FROM $table WHERE email = '$email' OR uname = '$uname'";
        return $conn->query($sql);
    }

    function showAllUsers($table, $conn) {
        $sql = "SELECT * FROM $table LIMIT 10";
        return $conn->query($sql);
    }

    function searchUsers($table, $conn, $searchTerm) {
        $sql = "SELECT * FROM $table WHERE worker_id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%' LIMIT 10";
        return $conn->query($sql);
    }

    function CloseCon($conn) {
        $conn->close();
    }
}
?>
