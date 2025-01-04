<?php
// Include the database configuration file
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $department = htmlspecialchars(trim($_POST['department_assoc']));
    $uploadsDir = "../../uploads/";

    $photoFields = ['photo_one', 'photo_two', 'photo_three', 'photo_four'];
    $uploadedPhotos = [];

    foreach ($photoFields as $photoField) {
        if (!empty($_FILES[$photoField]['name'])) {
            $fileName = time() . "_" . basename($_FILES[$photoField]['name']);
            $targetPath = $uploadsDir . $fileName;

            // Debugging logs
            error_log("Attempting to upload: " . $_FILES[$photoField]['name']);

            // Check if temporary file exists
            if (!file_exists($_FILES[$photoField]['tmp_name'])) {
                error_log("Temporary file missing for: " . $_FILES[$photoField]['name']);
            }

            // Move file and log errors
            if (move_uploaded_file($_FILES[$photoField]['tmp_name'], $targetPath)) {
                $uploadedPhotos[$photoField] = $fileName;

                // Delete old file
                if (!empty($_POST['current_' . $photoField]) && file_exists($uploadsDir . $_POST['current_' . $photoField])) {
                    unlink($uploadsDir . $_POST['current_' . $photoField]);
                }
            } else {
                error_log("Failed to upload file: " . $_FILES[$photoField]['name']);
                $uploadedPhotos[$photoField] = $_POST['current_' . $photoField] ?? null;
            }
        } else {
            $uploadedPhotos[$photoField] = $_POST['current_' . $photoField] ?? null;
        }
    }

    // Update the database
    $stmt = $conn->prepare(
        "UPDATE gallery SET department_assoc = ?, photo_one = ?, photo_two = ?, photo_three = ?, photo_four = ? WHERE id = ?"
    );
    $stmt->bind_param(
        "sssssi",
        $department,
        $uploadedPhotos['photo_one'],
        $uploadedPhotos['photo_two'],
        $uploadedPhotos['photo_three'],
        $uploadedPhotos['photo_four'],
        $id
    );

    if ($stmt->execute()) {
        // Redirect with Success flag
            header("Location: ../gallery.php?success&type=galleryUpdate");
            exit();
    } else {
        // Redirect with error flag
            header("Location: ../gallery.php?error&type=galleryUpdate");
            exit();
    }
    $stmt->close();
    $conn->close();
    exit();
} else {
    header("Location: ../gallery.php?message=Invalid request");
    exit();
}
?>
