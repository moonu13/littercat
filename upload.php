<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login');
    exit();
}

// file upload handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $fileName = basename($_FILES['file']['name']);
    $filePath = $uploadDir . $fileName;
    
    // debug output
    echo 'tmp file: ' . $_FILES['file']['tmp_name'] . '<br>';
    echo 'target path: ' . $filePath . '<br>';
    echo 'error code: ' . $_FILES['file']['error'] . '<br>';
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        echo '<!DOCTYPE html><html><head><meta charset="UTF-8">';
        echo '<style>body { background: #110e0f; color: #ffe7f3; font-family: Outfit; text-align: center; }';
        echo 'div { background: #21191d; padding: 20px; border-radius: 15px; display: inline-block; margin-top: 50px; }';
        echo 'a { color: #ff3d9e; text-decoration: none; }</style></head><body>';
        echo '<div><img src="checkmark.svg" alt="Success" style="width: 50px; height: 50px;"><p>Upload was successful!</p>';
        echo '<a href="files">Back to Files</a></div></body></html>';
        exit();
    } else {
        echo '<!DOCTYPE html><html><head><meta charset="UTF-8">';
        echo '<style>body { background: #110e0f; color: #ffe7f3; font-family: Outfit; text-align: center; }';
        echo 'div { background: #21191d; padding: 20px; border-radius: 15px; display: inline-block; margin-top: 50px; }';
        echo 'a { color: #ff3d9e; text-decoration: none; }</style></head><body>';
        echo '<div><img src="forbidden.svg" alt="Failed" style="width: 50px; height: 50px;"><p>Upload failed.</p>';
        echo '<a href="files">Back to Files</a></div></body></html>';
        exit();
    }
}

// fallback redirect
header('Location: files');
exit();
?>
