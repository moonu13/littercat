<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// if requestin a .css file, show it az raw text
if (strpos($path, ".css") !== false && file_exists(__DIR__ . $path)) {
    header("Content-Type: text/css");
    readfile(__DIR__ . $path);
    exit;
}

// handle images PROPERLY
if (preg_match('/\.(svg|png|jpg|jpeg|gif)$/', $path) && file_exists(__DIR__ . $path)) {
    $mime_types = [
        'svg' => 'image/svg+xml',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif'
    ];
    
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if (isset($mime_types[$ext])) {
        header("Content-Type: " . $mime_types[$ext]);
        readfile(__DIR__ . $path);
        exit;
    }
}

// normal file handlin
if (file_exists(__DIR__ . $path)) {
    include __DIR__ . $path;
    exit;
} elseif (file_exists(__DIR__ . $path . ".php")) {
    include __DIR__ . $path . ".php";
    exit;
} elseif (file_exists(__DIR__ . $path . ".html")) {
    include __DIR__ . $path . ".html";
    exit;
}

// 404 if file dont exist
http_response_code(404);
echo "404 Not Found";

?>
