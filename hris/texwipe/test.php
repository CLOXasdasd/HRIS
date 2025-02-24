<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hours Rendered Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        label, input {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Hours Rendered Calculator</h1>
    <label for="startTime">Start Time (HH:MM:SS):</label>
    <input type="time" id="startTime" required>

    <label for="endTime">End Time (HH:MM:SS):</label>
    <input type="time" id="endTime" required>

    <h2 id="result">Total hours rendered: 0 hours</h2>

    <script>
        function calculateHours() {
            // Get the start and end times from the input fields
            const startTime = document.getElementById('startTime').value;
            const endTime = document.getElementById('endTime').value;

            if (!startTime || !endTime) {
                document.getElementById('result').innerText = 'Total hours rendered: 0 hours';
                return;
            }

            // Parse the start and end times
            const start = new Date(`1970-01-01T${startTime}Z`);
            const end = new Date(`1970-01-01T${endTime}Z`);

            // Compute the difference in milliseconds
            const diff = end - start;

            // Convert milliseconds to hours
            const hours = diff / (1000 * 60 * 60);

            // Display the result
            document.getElementById('result').innerText = `Total hours rendered: ${hours.toFixed(2)} hours`;
        }

        // Add event listeners to update the result in real-time
        document.getElementById('startTime').addEventListener('input', calculateHours);
        document.getElementById('endTime').addEventListener('input', calculateHours);
    </script>
</body>
</html>
