<?php
// Include the database configuration file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $department_id = $conn->real_escape_string($_POST['department_id']);
    $department_name = $conn->real_escape_string($_POST['department_name']);

    // Insert the data into the database
    $sql = "INSERT INTO categories (department_id, department_name) 
            VALUES ('$department_id', '$department_name')";

if ($conn->query($sql) === TRUE) {
    // Redirect with success flag
    header("Location: dashboard.php?success=1");
    exit();
} else {
    // Redirect with error flag
    header("Location: dashboard.php?error=1");
    exit();
}

    // Close the connection
    $conn->close();
}
?>
