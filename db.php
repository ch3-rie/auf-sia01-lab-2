<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sia_db";

try {
    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Database connection failed!" . $conn->connect_error);
    }
} catch (Exception $e) {
    error_log("DB_CONNECTION_ERROR: " . $e->getMessage());

    die ("We are experiencing technical difficulties. Please try again later!");
    }
?>