<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "SchoolManagementSystem";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Optional: Uncomment to check connection
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
