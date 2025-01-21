<?php
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "e_health_mate"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $reason = $_POST['reason'];
    $doctor_id = $_POST['doctor_id'];

    // Prepare the SQL query
    $sql = "INSERT INTO patient_requests (name, email, phone, address, reason, doctor_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("sssssi", $name, $email, $phone, $address, $reason, $doctor_id);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>
                alert('Request submitted successfully!');
                window.location.href = '../Consult Form.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . addslashes($stmt->error) . "');
                window.location.href = '../Consult Form.html';
              </script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
