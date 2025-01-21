<?php
// Include the database connection file
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
// SQL query to fetch data
$sql = "SELECT id, name, email, phone, address, reason FROM patient_requests";
$result = $conn->query($sql);

// Prepare the data for output
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close the connection
$conn->close();

return $users
?>
