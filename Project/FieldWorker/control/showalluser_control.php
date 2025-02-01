<?php
// Include the database model
include '../model/db.php';

// Create an instance of the Model class
$model = new Model();
$conn = $model->OpenCon();

// Check if search is performed
if (isset($_POST["search"])) {
    $searchTerm = $_POST["search"];
    $result = $model->searchUsers("FieldWorker", $conn, $searchTerm);
} else {
    // Show all users if no search term is provided
    $result = $model->showAllUsers("FieldWorker", $conn);
}

// Display the results
if ($result->num_rows > 0) {
    foreach ($result as $row) {
        echo "Worker ID: " . $row["worker_id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Phone: " . $row["phn_num"] . "<br>";
        echo "Job Title: " . $row["job_title"] . "<br>";
        echo "Skills: " . $row["skills"] . "<br>";
        echo "<br><br>";
    }
} else {
    echo "No users found.";
}

// Close the database connection
$model->CloseCon($conn);
?>
