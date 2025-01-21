<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_health_mate";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Get the input data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $id = $conn->real_escape_string($data['id']);

    // SQL to delete the row
    $sql = "DELETE FROM patient_requests WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Record deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete record']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}

// Close the connection
$conn->close();
?>
