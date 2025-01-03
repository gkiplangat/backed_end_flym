<?php 
// Include Header Section
include "includes/header.php";
// Include the database configuration file
include 'admin/config.php';

// Define the number of records per page
$recordsPerPage = 12;

// Get the current page from the query string, default is 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $recordsPerPage;

// SQL query to fetch data from the 'gallery' table with LIMIT and OFFSET
$sql = "SELECT id, department_assoc, photo_one, photo_two, photo_three, photo_four 
        FROM gallery 
        LIMIT $recordsPerPage OFFSET $offset"; 

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result && $result->num_rows > 0) {
    echo '<div class="container">';
    echo '<div class="row g-3">'; // Add Bootstrap row and gutter class

    // Initialize a unique ID for the carousel
    $carouselId = 0;

    while ($row = $result->fetch_assoc()) {
        $photos = [
            htmlspecialchars($row['photo_one']),
            htmlspecialchars($row['photo_two']),
            htmlspecialchars($row['photo_three']),
            htmlspecialchars($row['photo_four']),
        ];

        foreach ($photos as $key => $photo) {
            // Display each image in the grid
            echo '<div class="col-lg-3 col-md-4 col-sm-12">';
            echo '<div class="card">';
            echo '<img src="uploads/' . $photo . '" class="img-fluid" alt="Photo" data-bs-toggle="modal" data-bs-target="#modal' . $carouselId . '">';
            echo '</div>';
            echo '</div>';
        }

        // Modal with Carousel for scrolling images
        echo '
        <div class="modal fade" id="modal' . $carouselId . '" tabindex="-1" aria-labelledby="modalLabel' . $carouselId . '" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel' . $carouselId . '">' . htmlspecialchars($row['department_assoc']) . '</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div id="carousel' . $carouselId . '" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">';
        
        // Add images to the carousel
        foreach ($photos as $index => $photo) {
            $activeClass = $index === 0 ? 'active' : ''; // Set the first image as active
            echo '
                    <div class="carousel-item ' . $activeClass . '">
                      <img src="uploads/' . $photo . '" class="d-block w-100" alt="Photo">
                    </div>';
        }

        echo '
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $carouselId . '" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carousel' . $carouselId . '" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>';

        // Increment the carousel ID for uniqueness
        $carouselId++;
    }

    echo '</div>'; // Close row
    echo '</div>'; // Close container

    // Pagination Controls
    $totalRecordsQuery = "SELECT COUNT(*) AS total FROM gallery";
    $totalResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalResult->fetch_assoc()['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);

    echo '<nav>';
    echo '<ul class="pagination justify-content-center">';
    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = $i == $page ? 'active' : '';
        echo '<li class="page-item ' . $activeClass . '">';
        echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
} else {
    // If no data is found
    echo '<div class="text-center">No gallery data found</div>';
}

// Close the database connection
$conn->close();
?>

<!-- Include Footer Section -->
<?php 
include "includes/footer.php";
?>
