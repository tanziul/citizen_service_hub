<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Options</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
<?php include('header.php'); ?>

    <div class="main-container">
        <section class="signup-options">
            <h1>Select Signup Option</h1>
            <div class="options-container">
                <a href="../../admin/view/admin_reg.php" class="btn-primary">Signup as Admin</a>
                <a href="../../citizen/view/citizen_reg.php" class="btn-primary">Signup as Citizen</a>
                <a href="../../ServiceProvider/view/serviceprovider_reg.php" class="btn-primary">Signup as Service Provider</a>
                <a href="../../FieldWorker/view/fieldworker_reg.php" class="btn-primary">Signup as Field Worker</a>
            </div>
        </section>
    </div>

<?php include('footer.php'); ?>
</body>
</html>
