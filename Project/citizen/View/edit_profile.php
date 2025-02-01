<?php include('../../layouts/view/header.php'); ?>
<?php include('../control/edit_profile_control.php'); ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../layouts/css/home.css">
<script src="../js/myjs.js" defer></script>

<div class="main-container">
    <section class="form-section">
        <h1>Edit Profile</h1>
        <form action="" method="post" onsubmit="return validation()">
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>"></td>
                    <td><p id="nameError"></p></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"></td>
                    <td><p id="emailError"></p></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>"></td>
                    <td><p id="phoneError"></p></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="address" id="address"><?php echo htmlspecialchars($address); ?></textarea></td>
                    <td><p id="addressError"></p></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="Male" id="genderMale" <?php echo ($gender == 'Male') ? 'checked' : ''; ?>> Male
                        <input type="radio" name="gender" value="Female" id="genderFemale" <?php echo ($gender == 'Female') ? 'checked' : ''; ?>> Female
                        <input type="radio" name="gender" value="Other" id="genderOther" <?php echo ($gender == 'Other') ? 'checked' : ''; ?>> Other
                    </td>
                    <td><p id="genderError"></p></td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <input type="submit" name="update" value="Update">
                        <input type="reset" name="reset" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
    </section>
</div>

<?php include('../../layouts/view/footer.php'); ?>
