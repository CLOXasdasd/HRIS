<?php

// // Required if your environment does not handle autoloading
// require 'twilio\src\twilio\autoload.php';

// // Your Account SID and Auth Token from console.twilio.com
// $sid = "AC0d4815d7ab929786196d054db471d2c5";
// $token = "0a093542620c5dcc1cdc4c3ef8af23b4";
// $client = new Twilio\Rest\Client($sid, $token);

// // Use the Client to make requests to the Twilio REST API
// $client->messages->create(
//     // The number you'd like to send the message to
//     '+639606361636',
//     [
//         // A Twilio phone number you purchased at https://console.twilio.com
//         'from' => '+16414011407',
//         // The body of the text message you'd like to send
//         'body' => "test"
//     ]
// );

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Capture</title>
</head>
<body>
    <h1>Camera Capture Example</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="capture">Capture</button>
    <canvas id="canvas" width="640" height="480"></canvas>
    <script>
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const captureButton = document.getElementById('capture');
const startButton = document.getElementById('start');
const context = canvas.getContext('2d');

// Request access to the user's camera
startButton.addEventListener('click', () => {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            // Hide the start button and show the capture button
            startButton.style.display = 'none';
            captureButton.style.display = 'inline-block';

            // Display the video feed in the video element
            video.srcObject = stream;
            video.play();
        })
        .catch(err => {
            console.error("Error accessing the camera: " + err);
        });
});

// Capture the image when the button is clicked
captureButton.addEventListener('click', () => {
    // Draw the video frame to the canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Optionally, display the captured image
    canvas.style.display = 'block';
});
    </script>
</body>
</html>