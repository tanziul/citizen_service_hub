<?php
include '../model/db.php';
session_start();

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];

    $mydb = new Model();
    $conobj = $mydb->OpenCon();

    // Delete user by admin_id
    $result = $mydb->deleteUserById($conobj, "admin", $admin_id);

    if ($result === TRUE) {
        echo "User deleted successfully.";
        header("Location: ../view/showall_user.php");
    } else {
        echo "Error: " . $conobj->error;
    }

    $mydb->CloseCon($conobj);
} else {
    echo "No user selected to delete.";
}
?>