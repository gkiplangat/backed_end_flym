<?php
// Include the database configuration file
include 'config.php';

// SQL query to fetch data from the 'gallery' table
$sql = "SELECT id, department_assoc, event_title, event_description, venue, date, photo_one, photo_two, photo_three, photo_four FROM gallery"; 

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['department_assoc']) . "</td>";
        echo "<td>" . htmlspecialchars($row['event_title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['event_description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['venue']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td><img src='../uploads/" . htmlspecialchars($row['photo_one']) . "' alt='Photo 1' width='100' height='100'></td>";
        echo "<td><img src='../uploads/" . htmlspecialchars($row['photo_two']) . "' alt='Photo 2' width='100' height='100'></td>";
        echo "<td><img src='../uploads/" . htmlspecialchars($row['photo_three']) . "' alt='Photo 3' width='100' height='100'></td>";
        echo "<td><img src='../uploads/" . htmlspecialchars($row['photo_four']) . "' alt='Photo 4' width='100' height='100'></td>";
        echo "<td>
                <a href='actions/edit_gallery.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                <a href='actions/delete_gallery.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    // If no data is found
    echo "<tr><td colspan='10' class='text-center'>No gallery data found</td></tr>";
}

// Close the database connection
$conn->close();
?>
