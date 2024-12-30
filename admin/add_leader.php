<?php
// Include the database configuration file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $department = $conn->real_escape_string($_POST['department']);
    $name = $conn->real_escape_string($_POST['fullname']);
    $position = $conn->real_escape_string($_POST['position']);
    $phone = $conn->real_escape_string($_POST['phone_number']);

    // Insert the data into the database
    $sql = "INSERT INTO leaders (department, fullname, position, phone_number) 
            VALUES ('$department', '$name', '$position', '$phone')";

if ($conn->query($sql) === TRUE) {
    // Redirect with success flag
   header("Location: dashboard.php?success&type=leader");
    exit();
} else {
    // Redirect with error flag
    header("Location: dashboard.php?error&type=leader");
    exit();
}

    // Close the connection
    $conn->close();
}
?>
