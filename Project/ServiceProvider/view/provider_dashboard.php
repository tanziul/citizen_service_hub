<?php
include('../control/dashboard_control.php');  // Include dashboard control for Service Provider
include('../../layouts/view/header.php');     // Include header layout
?>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">

<div class="service-provider-dashboard">
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="#manage-field-workers">Manage Field Workers</a></li>
                <li><a href="#view-service-requests">View Service Requests</a></li>
                <li><a href="#assigned-tasks">Assigned Tasks</a></li>
                <li><a href="#status-updates">Status Updates</a></li>
                <li><a href="#manage-profile">Manage Profile</a></li>
                <li><a href="../control/session_destroy.php" class="logout-btn">Log Out</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="dashboard-header">
                <h1>Welcome, <?php echo htmlspecialchars($uname); ?></h1>
            </header>

            <div class="dashboard-main-content">
                <!-- Service Provider Profile Section -->
                <section class="profile-section" id="service-provider-profile">
                    <h2>Service Provider Profile</h2>
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
                                <td>Date of Birth:</td>
                                <td><?php echo htmlspecialchars($dob); ?></td>
                            </tr>
                        </table>
                        <a href="../view/edit_profile.php" class="edit-profile-btn">Edit Profile</a>
                    </div>
                </section>

                <!-- Assigned Tasks Section -->
                <section class="tasks-section" id="assigned-tasks">
                    <h2>Assigned Tasks</h2>
                    <div class="tasks-overview">
                        <p>No tasks assigned yet.</p> <!-- Update dynamically based on database -->
                    </div>
                </section>

                <!-- Service Requests Section -->
                <section class="requests-section" id="view-service-requests">
                    <h2>Service Requests</h2>
                    <div class="requests-overview">
                        <p>No service requests received yet.</p> <!-- Update dynamically based on database -->
                    </div>
                </section>

                <!-- Status Updates Section -->
                <section class="status-section" id="status-updates">
                    <h2>Status Updates</h2>
                    <div class="status-overview">
                        <p>No updates available yet.</p> <!-- Update dynamically based on database -->
                    </div>
                </section>
            </div>
        </main>
    </div>
</div>

<?php include('../../layouts/view/footer.php'); ?>
