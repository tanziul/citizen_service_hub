<?php
// Include the controller to fetch data
require '../control/showalluser_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>
<body>

<h1>View Users</h1>

<!-- Form to search users by worker_id or name -->
<form method="post" action="">
    <label for="search">Search by Worker ID or Name:</label>
    <input type="text" name="search" id="search" placeholder="Enter worker ID or name" required>
    <input type="submit" value="Search">
</form>


<?php

?>

</body>
</html>
