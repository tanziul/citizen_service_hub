<?php include('../../layouts/view/header.php'); ?>
<?php include('../control/reg_control.php'); ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">
<script src="../js/myjs.js" defer></script>

<div class="service-provider-reg"> <!-- Added a wrapper class to avoid conflict -->
    <div class="main-container">
        <section class="form-section">
            <h1>Register as Service Provider</h1>
            <form action="" method="post" onsubmit="return validation()">
                <!-- Personal Information Section -->
                <table>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="name" id="name" placeholder="Enter Full Name"></td>
                        <td><?php echo $nameErr; ?></td>
                        <td><p id="nameError"></p></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" id="email" placeholder="Enter Email"></td>
                        <td><?php echo $emailErr; ?></td>
                        <td><p id="emailError"></p></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><input type="tel" name="phone_number" id="phone_number" placeholder="Enter Phone Number"></td>
                        <td><?php echo $phone_numberErr; ?></td>
                        <td><p id="phoneError"></p></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><textarea name="address" id="address" rows="3" placeholder="123 Main St, City, Country"></textarea></td>
                        <td><?php echo $addressErr; ?></td>
                        <td><p id="addressError"></p></td>
                    </tr>
                

                <!-- Service Information Section -->
                    <tr>
                        <td>Service Type:</td>
                        <td>
                            <input type="checkbox" name="service_type[]" value="Plumbing"> Plumbing
                            <input type="checkbox" name="service_type[]" value="Electrical"> Electrical
                            <input type="checkbox" name="service_type[]" value="Carpentry"> Carpentry
                            <input type="checkbox" name="service_type[]" value="Painting"> Painting
                        </td>
                        <td><?php echo $service_typeErr; ?></td>
                        <td><p id="serviceTypeError"></p></td>
                    </tr>
                

                <!-- Account Information Section -->

               
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="uname" id="uname" placeholder="Enter Username"></td>
                        <td><?php echo $unameErr; ?></td>
                        <td><p id="unameError"></p></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" id="pass" placeholder="Enter Password"></td>
                        <td><?php echo $passwordErr; ?></td>
                        <td><p id="passError"></p></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"></td>
                        <td><?php echo $confirmPasswordErr; ?></td>
                        <td><p id="confirmPassError"></p></td>
                    </tr>
                </table>

                <!-- Submit and Reset Buttons -->
                <div class="button-container">
                    <input type="submit" name="submit" value="Register">
                    <input type="reset" name="reset" value="Clear">
                </div>

                <!-- Log in Link -->
                <div class="login-link">
                    <p1>Already have an account? <a href="../../layouts/view/login.php">Log in</a></p1>
                </div>
            </form>
        </section>
    </div>
</div>

<?php include('../../layouts/view/footer.php'); ?>
