<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database configuration file
include 'config.php';

// Check if an ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch record to retrieve file paths
    $fetchQuery = "SELECT photo_one, photo_two, photo_three, photo_four FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($fetchQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Delete the record
            $deleteQuery = "DELETE FROM gallery WHERE id = ?";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                // Delete associated files
                $files = [
                    '../uploads/' . $row['photo_one'],
                    '../uploads/' . $row['photo_two'],
                    '../uploads/' . $row['photo_three'],
                    '../uploads/' . $row['photo_four']
                ];
                foreach ($files as $file) {
                    if (file_exists($file) && !is_dir($file)) {
                        unlink($file);
                    }
                }
                header("Location: gallery.php?msg=Record deleted successfully.");
                exit();
            } else {
                die("Error deleting record: " . $stmt->error);
            }
        } else {
            die("Record not found.");
        }
    } else {
        die("Error fetching record: " . $stmt->error);
    }
} else {
    die("Invalid ID provided.");
}

$conn->close();
?>
