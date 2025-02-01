<?php include('../../layouts/view/header.php'); ?>
<?php include('../control/reg_control.php'); ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">
<script src="../js/myjs.js" defer></script>

<div class="main-container">
    <section class="form-section">
        <h1>Sign Up As Citizen</h1>
        <form action="" method="post" onsubmit="return validation()">
            <!-- Personal Information Section -->
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" id="name" placeholder="Enter Full Name"></td><td><?php echo $nameErr; ?></td>
                    <td><p id="nameError"></p></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" id="email" placeholder="Enter your email"></td><td><?php echo $emailErr; ?></td>
                    <td><p id="emailError"></p></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="tel" name="phone" id="phone" placeholder="Enter Your Phone number"></td><td><?php echo $phoneErr; ?></td>
                    <td><p id="phoneError"></p></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="address" id="address" rows="3" placeholder="123 Main St, City, Country"></textarea></td><td><?php echo $addressErr; ?></td>
                    <td><p id="addressError"></p></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="Male" id="genderMale"> Male
                        <input type="radio" name="gender" value="Female" id="genderFemale"> Female
                        <input type="radio" name="gender" value="Other" id="genderOther"> Other
                    </td><td><?php echo $genderErr; ?></td>
                    <td><p id="genderError"></p></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="uname" id="uname" placeholder="Enter Username"></td><td><?php echo $unameErr; ?></td>
                    <td><p id="unameError"></p></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="pass" placeholder="Enter Password"></td><td><?php echo $passwordErr; ?></td>
                    <td><p id="passError"></p></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"></td>
                    <td><p id="confirmPassError"></p></td>
                </tr>
                <!-- Submit and Reset Buttons -->
                <tr>
                    <td colspan="2" class="button-container">
                        <input type="submit" name="submit" value="Sign Up">
                        <input type="reset" name="reset" value="Clear">
                    </td>
                </tr>
                <!-- Log in Link -->
                <tr>
                    <td colspan="2" class="login-link">
                        <p>Already have an account? <a href="../../layouts/view/login.php">Log in</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </section>
</div>

<?php include('../../layouts/view/footer.php'); ?>
