<?php
// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and trim input values
    $name = htmlspecialchars(trim($_POST['name']));
    $phone_no = htmlspecialchars(trim($_POST['phone_no']));
    $location = htmlspecialchars(trim($_POST['location']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Simple validation
    if (empty($name) || empty($phone_no) || empty($location) || empty($message)) {
        echo "<p style='color:red;'>All fields are required.</p>";
        exit;
    }

    // Phone number validation (example: 10-digit number)
    if (!preg_match("/^\d{10}$/", $phone_no)) {
        echo "<p style='color:red;'>Invalid phone number format. Please use a 10-digit number (e.g., 1234567890).</p>";
        exit;
    }

    // Database connection (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cleaning"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Prepare and bind (prepared statement)
    $stmt = $conn->prepare("INSERT INTO company (name, telephone, location, message) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("<p style='color:red;'>Error preparing statement: " . $conn->error . "</p>");
    }
    $stmt->bind_param("ssss", $name, $phone_no, $location, $message);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<h2 style='color:green;'>Data submitted successfully!</h2>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
   echo "<p style='color:red;'>No form submitted. Please go back and fill out the form.</p>";
}
?>