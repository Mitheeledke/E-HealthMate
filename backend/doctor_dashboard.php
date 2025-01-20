<?php
session_start();
if ($_SESSION['role'] !== 'doctor') {
    header("Location: ../Login.html");
    exit();
}
else{
    header("Location: ../Doctors dashboard.html");
}
echo "Welcome, " . $_SESSION['username'] . "! This is the Doctor Dashboard.";
?>
