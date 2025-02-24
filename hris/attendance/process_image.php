<?php
// Receive image data from the client
$imageData = json_decode(file_get_contents('php://input'), true)['image'];

// Decode base64 encoded image data
$imageData = str_replace('data:image/png;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);
$image = base64_decode($imageData);

// Save the image to a file (you can perform any other processing here)
$filename = 'captured_image.png';
file_put_contents($filename, $image);

// Send a response back to the client
echo json_encode(['success' => true, 'filename' => $filename]);
?>