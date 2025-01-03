<?php
// Include the database configuration file
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the data from the gallery table
    $sql = "SELECT * FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Display the form with the current values
        echo "<form action='update_gallery.php' method='POST' enctype='multipart/form-data'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <label for='department_assoc'>Department</label>
                <input type='text' name='department_assoc' value='" . htmlspecialchars($row['department_assoc']) . "' required>
                
                <label for='event_title'>Event Title</label>
                <input type='text' name='event_title' value='" . htmlspecialchars($row['event_title']) . "' required>
                
                <label for='event_description'>Event Description</label>
                <textarea name='event_description' required>" . htmlspecialchars($row['event_description']) . "</textarea>
                
                <label for='venue'>Venue</label>
                <input type='text' name='venue' value='" . htmlspecialchars($row['venue']) . "' required>
                
                <label for='date'>Date</label>
                <input type='date' name='date' value='" . $row['date'] . "' required>
                
                <label for='photo_one'>Photo 1</label>
                <input type='file' name='photo_one'>
                
                <label for='photo_two'>Photo 2</label>
                <input type='file' name='photo_two'>
                
                <label for='photo_three'>Photo 3</label>
                <input type='file' name='photo_three'>
                
                <label for='photo_four'>Photo 4</label>
                <input type='file' name='photo_four'>
                
                <button type='submit'>Update</button>
              </form>";
    } else {
        echo "No data found.";
    }

    $stmt->close();
}

$conn->close();
?>
