<?php
// Include the database configuration file
include 'admin/config.php';

// Set the default time zone to match your server's or desired time zone
date_default_timezone_set('Africa/Nairobi');  

// SQL query to fetch upcoming events, ordered by the closest date first
$sql = "SELECT id, department_assoc, event_title, event_description, venue, date, event_time, photo 
        FROM events 
        WHERE date >= CURDATE() 
        ORDER BY date ASC"; 

// Execute the query
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1 class="mb-4">Our Upcoming Missions & Meetings</h1>

    <div class="row">
        <?php
        // Check if the query was successful and if there are results
        if ($result) {
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    // Ensure the event date and time are in the correct format
                    $event_datetime_str = $row['date'] . ' ' . $row['event_time']; // Combine date and time
                    $event_datetime = new DateTime($event_datetime_str, new DateTimeZone('Africa/Nairobi'));
                    $event_timestamp = $event_datetime->getTimestamp(); // Get the timestamp of the event
                    
                    // Format the event date for display
                    $formatted_event_date = $event_datetime->format('Y-m-d H:i A'); // Example: 2025-02-13 03:30 PM
                    ?>
                    <!-- Event Card -->
                    <div class="col-md-4 mb-4"> <!-- 3 columns for 4 events per row -->
                        <div class="card h-100">
                            <div class="row g-0">
                                <div class="col-12">
                                    <!-- Event Image -->
                                    <img src="uploads/<?php echo htmlspecialchars($row['photo']); ?>" class="img-fluid rounded-start" alt="Event Photo">
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="card-body">
                                        <!-- Countdown Timer -->
                                        <p class="card-text text-muted">
                                            <button id="countdown-<?php echo $row['id']; ?>" class="btn btn-info btn-sm"></button>
                                        </p>

                                        <h5 class="card-title"><?php echo htmlspecialchars($row['event_title']); ?></h5>
                                        
                                        <p class="card-text"><strong>Venue:</strong> <?php echo htmlspecialchars($row['venue']); ?></p>
                                        <p class="card-text"><strong>Date & Time:</strong> <?php echo htmlspecialchars($formatted_event_date); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // JavaScript to update the countdown
                        (function() {
                            var eventDate = <?php echo $event_timestamp * 1000; ?>; // Convert timestamp to milliseconds
                            var countdownElement = document.getElementById('countdown-<?php echo $row['id']; ?>');

                            function updateCountdown() {
                                var now = new Date().getTime(); // Get current time in milliseconds
                                var distance = eventDate - now;

                                // Calculate days, hours, minutes, and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                // Display the result
                                countdownElement.innerHTML = "<strong>" + days + " DAYS " + hours + " HRS " + minutes + " MINS " + seconds + " SECS </strong>";

                                // If the countdown is finished, display a message
                                if (distance < 0) {
                                    countdownElement.innerHTML = "<strong>Event Started!</strong>";
                                }
                            }

                            // Update the countdown every 1 second
                            setInterval(updateCountdown, 1000);
                        })();
                    </script>
                    <?php
                }
            } else {
                echo '<p class="text-center">Currently, we do not have active meetings.</p>';
            }
        } else {
            echo '<p class="text-center">Error fetching events: ' . $conn->error . '</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div> <!-- End of row -->
</div>
