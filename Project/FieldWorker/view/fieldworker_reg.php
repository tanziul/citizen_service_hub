<?php include('../../layouts/view/header.php'); ?>
<?php include('../control/reg_control.php'); ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">
<script src="../js/myjs.js" defer></script>

<div class="fieldworker-reg"> <!-- Added a wrapper class to avoid conflict -->
    <div class="main-container">
        <section class="form-section">
            <h1>Register as Field Worker</h1>
            <form action="" method="post" onsubmit="return validation()">
                <table>
                    <!-- Personal Information Section -->
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
                        <td><input type="tel" name="phn_num" id="phone" placeholder="Enter Phone Number"></td>
                        <td><?php echo $phn_numErr; ?></td>
                        <td><p id="phoneError"></p></td>
                    </tr>
                    <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob" id ="dob"></td>
                    <td><p id="dobError"></p></td>
                    <td><?php echo $dobErr; ?></td>
                </tr>

                    <tr>
                        <td>Address:</td>
                        <td><textarea name="address" id="address" rows="3" placeholder="123 Main St, City, Country"></textarea></td>
                        <td><?php echo $addressErr; ?></td>
                        <td><p id="addressError"></p></td>
                    </tr>

                    <!-- Job Information Section -->
                    <tr>
                        <td>Previous Employer:</td>
                        <td><input type="text" name="pre_employer" id="pre_employer" placeholder="Enter Previous Employer"></td>
                        <td><?php echo $pre_employerErr; ?></td>
                        <td><p id="preEmployerError"></p></td>
                    </tr>
                    <tr>
                        <td>Job Title:</td>
                        <td><input type="text" name="job_title" id="job_title" placeholder="Enter Job Title"></td>
                        <td><?php echo $job_titleErr; ?></td>
                        <td><p id="jobTitleError"></p></td>
                    </tr>
                    <tr>
                        <td>Job Responsibilities:</td>
                        <td><textarea name="job_responsibility" id="job_responsibility" rows="3" placeholder="Describe Job Responsibilities"></textarea></td>
                        <td><?php echo $job_responsibilityErr; ?></td>
                        <td><p id="jobResponsibilityError"></p></td>
                    </tr>
                    <tr>
                        <td>Skills:</td>
                        <td>
                            <input type="checkbox" name="skills[]" value="Plumbing"> Plumbing
                            <input type="checkbox" name="skills[]" value="Electrical"> Electrical
                            <input type="checkbox" name="skills[]" value="Carpentry"> Carpentry
                            <input type="checkbox" name="skills[]" value="Painting"> Painting
                        </td>
                        <td><?php echo $skillsErr; ?></td>
                        <td><p id="skillsError"></p></td>
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
                        <td><input type="password" name="confirmPassword" id="confirm_password" placeholder="Confirm Password"></td>
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
