<?php
// Include the database configuration file
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $sql = "DELETE FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        // Redirect to the gallery page after deletion
        header("Location: ../gallery.php?success");
        exit();
    } else {
        // Redirect with error message
        header("Location: ../gallery.php?error");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
