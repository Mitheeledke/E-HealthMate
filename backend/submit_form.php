<?php
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "e_health_mate"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $reason = $_POST['reason'];

    // Prepare and execute SQL statement
    $sql = "INSERT INTO patient_requests (name, email, phone, address, reason) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $reason);

    if ($stmt->execute()) {
        // Success - Redirect to Consult Form.html with success message
        echo "<script>alert('Request submitted successfully!'); window.location.href = '../Patients Requests.html';</script>"; 
    } else {
        // Error - Display error message and stay on the same page
        echo "<script>alert('Error submitting request. Please try again.');</script>"; 
    }

    $stmt->close();
}

$conn->close();
?>