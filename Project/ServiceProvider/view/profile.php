<?php 
session_start();
if(!isset($_SESSION["uname"]))
{
header("Location: ../view/serviceprovider_reg.php");
}
?>

<html>
<head>
    <title>Profile</title>
</head>
<h1>My Profile</h1>
<body>
hello <?php echo $_SESSION["uname"]; ?> 
<br>
<a href="../control/session_destroy.php">Logout</a>


</body>


</html>