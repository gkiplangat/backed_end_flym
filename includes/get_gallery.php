<?php 
// Include Header Section
include "includes/header.php";
// Include the database configuration file
include 'admin/config.php';

// Define the number of images per page
$imagesPerPage = 12;

// Fetch all images from the database, ordered by the most recently added
$sql = "SELECT department_assoc, photo_one, photo_two, photo_three, photo_four FROM gallery ORDER BY created_at DESC";

$result = $conn->query($sql);

$allImages = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photos = [
            htmlspecialchars($row['photo_one']),
            htmlspecialchars($row['photo_two']),
            htmlspecialchars($row['photo_three']),
            htmlspecialchars($row['photo_four']),
        ];
        foreach ($photos as $photo) {
            if (!empty($photo)) {
                $allImages[] = [
                    'photo' => $photo,
                    'department_assoc' => htmlspecialchars($row['department_assoc']),
                ];
            }
        }
    }
}

// Calculate total pages and current page
$totalImages = count($allImages);
$totalPages = ceil($totalImages / $imagesPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalPages)); // Ensure page is within valid range

// Slice the images array for the current page
$offset = ($page - 1) * $imagesPerPage;
$imagesToDisplay = array_slice($allImages, $offset, $imagesPerPage);

// Display the images
echo '<div class="container">';
echo '<div class="row g-3">';

$modalId = 0;
foreach ($imagesToDisplay as $image) {
    echo '<div class="col-lg-3 col-md-4 col-sm-6">';
    echo '<div class="card">';
    echo '<img src="uploads/' . $image['photo'] . '" class="img-fluid" alt="Photo" data-bs-toggle="modal" data-bs-target="#carouselModal">';
    echo '</div>';
    echo '</div>';
}

echo '</div>'; // Close row
echo '</div>'; // Close container

// Modal with Bootstrap Carousel
echo '
<div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="carouselModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carouselModalLabel">Gallery</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">';

          // Add carousel items dynamically
          $isFirst = true;
          foreach ($allImages as $image) {
              $activeClass = $isFirst ? 'active' : '';
              echo '
              <div class="carousel-item ' . $activeClass . '">
                <img src="uploads/' . $image['photo'] . '" class="d-block w-100" alt="Photo" style="object-fit: contain; max-height: 80vh;">
                <div class="carousel-caption d-none d-md-block">
                  <h5>' . $image['department_assoc'] . '</h5>
                </div>
              </div>';
              $isFirst = false;
          }

echo '     </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>';

// Pagination Controls
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

// Close the database connection
$conn->close();
?>
