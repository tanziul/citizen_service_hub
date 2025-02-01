<?php

include('../../layouts/view/header.php');
include('../control/dashboard_control.php');
?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="#service-request">Service Request</a></li>
            <li><a href="#service-status">Service Status</a></li>
            <li><a href="#feedback">Feedback</a></li>
            <li><a href="../view/edit_profile.php">Manage Profile</a></li>
            <li><a href="../control/session_destroy.php" class="logout-btn">Log Out</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <header class="dashboard-header">
            <h1>Welcome <?php echo htmlspecialchars($_SESSION["uname"]); ?></h1>
        </header>

        <section class="citizen-info">
            <h2>Citizen Information</h2>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><?php echo htmlspecialchars($name); ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><?php echo htmlspecialchars($phone); ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo htmlspecialchars($address); ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo htmlspecialchars($gender); ?></td>
                </tr>
            </table>
        </section>
    </main>
</div>

<?php include('../../layouts/view/footer.php'); ?>

<?php
/* 
<?php 
session_start();
if(!isset($_SESSION["uname"]))
{
header("Location: ../view/citizen_reg.php");
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

*/
?>
