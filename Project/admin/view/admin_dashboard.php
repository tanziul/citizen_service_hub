<?php
include('../control/dashboard_control.php');
include('../../layouts/view/header.php');
?>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">

<div class="admin-dashboard">
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="#manage-service-providers">Manage Service Providers</a></li>
                <li><a href="#manage-field-workers">Manage Field Workers</a></li>
                <li><a href="#verify-profiles">Verify Profiles</a></li>
                <li><a href="#service-requests">Service Requests</a></li>
                <li><a href="#feedback">Feedback</a></li>
                <li><a href="#post-announcements">Post Announcements</a></li>
                <li><a href="../view/edit_profile.php">Manage Profile</a></li>
                <li><a href="../control/session_destroy.php" class="logout-btn">Log Out</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="dashboard-header">
                <h1>Welcome,  <?php echo htmlspecialchars($_SESSION["uname"]); ?></h1>
            </header>

            <div class="dashboard-main-content">
                <!-- Statistics Section -->
                <section class="left-section">
                    <h2>Statistics Overview</h2>
                    <div class="stats-overview">
                        <!-- First Row (Two Cards) -->
                        <div class="stats-row">
                            <div class="stat-card">
                                <h3>Service Providers</h3>
                                <p>10</p>
                            </div>
                            <div class="stat-card">
                                <h3>Field Workers</h3>
                                <p>20</p>
                            </div>
                        </div>

                        <!-- Second Row (Two Cards) -->
                        <div class="stats-row">
                            <div class="stat-card">
                                <h3>Pending Verifications</h3>
                                <p>5</p>
                            </div>
                            <div class="stat-card">
                                <h3>Total Requests</h3>
                                <p>30</p>
                            </div>
                        </div>

                        <!-- Third Row (Single Card Centered) -->
                        <div class="stats-row full-width">
                            <div class="stat-card full-width">
                                <h3>Feedbacks</h3>
                                <p>15</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Admin Profile Section -->
                <section class="right-section" id="admin-profile">
                    <h2>Admin Profile</h2>
                    <div class="profile-details">
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
                            <tr>
                                <td>Date Of Birth:</td>
                                <td><?php echo htmlspecialchars($dob); ?></td>
                            </tr>
                        </table>
                        <a href="../view/edit_profile.php" class="edit-profile-btn">Edit Profile</a>
                    </div>
                </section>
            </div>


        </main>
    </div>
</div>

<?php include('../../layouts/view/footer.php'); ?>
