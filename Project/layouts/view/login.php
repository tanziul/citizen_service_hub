<?php

include '../control/login_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <?php include('header.php'); ?>

    <!-- Main Container -->
    <div class="main-container">
        <div class="form-container">
            <div class="form-card">
                <h1 class="form-title">Welcome Back!</h1>
                <p class="form-subtitle">Please log in to continue</p>

                <form action="" method="POST" class="form">
                    <div class="form-group">
                        <label for="uname">Username</label>
                        <input type="text" id="uname" name="uname" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn-primary">
                    </div>
                </form>

                <p class="form-footer">
                    Don’t have an account? <a href="../view/signup_options.php" class="link">Sign Up</a>
                </p>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
