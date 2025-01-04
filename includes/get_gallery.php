<?php 
// Include Header Section
include "includes/header.php";
// Include the database configuration file
include 'admin/config.php';

// Define the number of images per page
$imagesPerPage = 12;

// Fetch all images from the database
$sql = "SELECT department_assoc, photo_one, photo_two, photo_three, photo_four FROM gallery";
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
    echo '<img src="uploads/' . $image['photo'] . '" class="img-fluid" alt="Photo" data-bs-toggle="modal" data-bs-target="#modal' . $modalId . '">';
    echo '</div>';
    echo '</div>';

    // Modal for the image
    echo '
    <div class="modal fade" id="modal' . $modalId . '" tabindex="-1" aria-labelledby="modalLabel' . $modalId . '" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel' . $modalId . '">' . $image['department_assoc'] . '</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="uploads/' . $image['photo'] . '" class="img-fluid" alt="Photo">
          </div>
        </div>
      </div>
    </div>';
    $modalId++;
}

echo '</div>'; // Close row
echo '</div>'; // Close container

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


