<?php
session_start();
if ($_SESSION['role'] !== 'patient') {
    header("Location: ../Login.html");
    exit();
}
else{
    header("Location: ../Patients dashboard.html");
}

echo "Welcome, " . $_SESSION['username'] . "! This is the Patient Dashboard.";
?>
