<?php
// Include the database configuration file
include 'config.php';

// SQL query to fetch data from the 'leaders' table
$sql = "SELECT department_id, department_name FROM categories ORDER BY department_id ASC";

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['department_name']) . "</td>";
        echo "</tr>";
    }
} else {
    // If no data is found
    echo "<tr><td colspan='4' class='text-center'>No leaders found</td></tr>";
}

// Close the database connection
$conn->close();
?>