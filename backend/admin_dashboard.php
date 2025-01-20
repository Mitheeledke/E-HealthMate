<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../Login.html");
    exit();
}

echo "Welcome, " . $_SESSION['username'] . "! This is the Admin Dashboard.";
?>
