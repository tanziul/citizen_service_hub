<?php
include '../control/edit_profile_control.php';
$nameErr = $emailErr = $phone_numberErr = $genderErr = $addressErr = $service_typeErr = $unameErr = $passwordErr = $confirmPasswordErr = "";

?>

<html>
<body>
<h1>Edit Profile</h1>
<form method="POST">
    <fieldset>
        <legend>Personal Information</legend>
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
                <td><?php echo $nameErr; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
                <td><?php echo $emailErr; ?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="tel" name="phone_number" value="<?php echo $phone_number; ?>" required></td>
                <td><?php echo $phone_numberErr; ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?> required> Male
                    <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?> required> Female
                    <input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked"; ?> required> Other
                </td>
                <td><?php echo $genderErr; ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea name="address" rows="3" cols="15" required><?php echo $address; ?></textarea></td>
                <td><?php echo $addressErr; ?></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Service Information</legend>
        <table>
            <tr>
                <td>Service Type:</td>
                <td>
                <input type="checkbox" name="service_type[]" value="Plumbing"> Plumbing
                        <input type="checkbox" name="service_type[]" value="Electrical"> Electrical
                        <input type="checkbox" name="sservice_type[]" value="Carpentry"> Carpentry
                        <input type="checkbox" name="service_type[]" value="Painting"> Painting
                </td>
                <td><?php echo $service_typeErr; ?></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Account Information</legend>
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="uname" value="<?php echo $uname; ?>" required></td>
                <td><?php echo $unameErr; ?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value=" " required></td>
                <td><?php echo $passwordErr; ?></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" value=" " required></td>
                <td><?php echo $confirmPasswordErr; ?></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <input type="submit" name="update" value="Update Profile">
    </fieldset>
</form>
</body>
</html>
