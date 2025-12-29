<?php
// upload-handler.php
// Save this file on your server where you host the website

// Check if file was uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['tutor_image'])) {
    $uploadDir = 'uploads/';
    
    // Create uploads directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $fileName = basename($_FILES['tutor_image']['name']);
    $fileTmpName = $_FILES['tutor_image']['tmp_name'];
    $fileSize = $_FILES['tutor_image']['size'];
    $fileError = $_FILES['tutor_image']['error'];
    $fileType = $_FILES['tutor_image']['type'];
    
    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    $maxSize = 2 * 1024 * 1024; // 2MB
    
    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPG and PNG allowed.']);
        exit;
    }
    
    // Validate file size
    if ($fileSize > $maxSize) {
        echo json_encode(['success' => false, 'error' => 'File too large. Maximum size is 2MB.']);
        exit;
    }
    
    // Generate unique filename
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = uniqid('tutor_', true) . '.' . $fileExt;
    $uploadPath = $uploadDir . $newFileName;
    
    // Move uploaded file
    if (move_uploaded_file($fileTmpName, $uploadPath)) {
        echo json_encode([
            'success' => true,
            'fileName' => $newFileName,
            'originalName' => $fileName,
            'filePath' => $uploadPath
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to upload file.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No file uploaded.']);
}
?>
