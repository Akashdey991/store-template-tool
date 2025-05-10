<?php
require 'includes/db.php'; // Database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from AJAX request
    $storeName = $_POST['storeName'] ?? '';
    $logoPath = $_POST['logoPath'] ?? '';
    $primaryColor = $_POST['primaryColor'] ?? '';
    $secondaryColor = $_POST['secondaryColor'] ?? '';
    $fontStyle = $_POST['fontStyle'] ?? '';
    $layoutStyle = $_POST['layoutStyle'] ?? '';
    $templateId = isset($_POST['template_id']) ? intval($_POST['template_id']) : 1;

    // Handle banner image upload
    $bannerImagePath = '';
    if (isset($_FILES['bannerImage']) && $_FILES['bannerImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileTmpPath = $_FILES['bannerImage']['tmp_name'];
        $fileName = basename($_FILES['bannerImage']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('banner_', true) . '.' . $fileExt;
        $destPath = $uploadDir . $newFileName;
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $bannerImagePath = $destPath;
        }
    }

    // Handle logo image upload
    $logoPath = '';
    if (isset($_FILES['logo']) && isset($_FILES['logo']['tmp_name']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileTmpPath = $_FILES['logo']['tmp_name'];
        $fileName = basename($_FILES['logo']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('logo_', true) . '.' . $fileExt;
        $destPath = $uploadDir . $newFileName;
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $logoPath = $destPath;
        }
    }

    // Validate data (simple example)
    if (!empty($storeName)) {
        try {
            // Prepare SQL statement
            $stmt = $pdo->prepare('INSERT INTO customizations (template_id, store_name, logo_path, banner_image, primary_color, secondary_color, font_style, layout_style) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$templateId, $storeName, $logoPath, $bannerImagePath, $primaryColor, $secondaryColor, $fontStyle, $layoutStyle]);

            $store_id = $pdo->lastInsertId();
            echo json_encode(['status' => 'success', 'message' => 'Customization saved successfully!', 'store_id' => $store_id]);
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Store name is required.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>