<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "e_health_mate"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role']; 

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT id, username, role, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email); 
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $row['password'])) { 
        // Verify role
        if ($row['role'] === $role) {
            // Successful login
            session_start(); 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect to appropriate page based on role
            if ($role === 'doctor') {
                header("Location: ../Doctors dashboard.php"); 
            } elseif ($role === 'patient') {
                header("Location: ../Patients dashboard.html"); 
            } elseif ($role === 'admin') {
                header("Location: admin_dashboard.php"); 
            }
            exit();
        } else {
            // Incorrect role
            $error = "Invalid role.";
        }
    } else {
        // Invalid password
        $error = "Invalid password.";
    }
} else {
    // Invalid email
    $error = "Invalid email.";
}

// Close connection
$stmt->close();
$conn->close();

// Display error message (if any)
if (isset($error)) {
    echo "<script>alert('".$error."'); window.location.href = '../login.html';</script>";
    exit();
}
?>