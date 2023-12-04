<?php
// banner.php

// Database connection
// Change fore setup!!!
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "infuse_media_04122023";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get visitor information
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$view_date = date('Y-m-d H:i:s');
$page_url = $_SERVER['REQUEST_URI'];

// Check if the visitor already exists in the database
$sql = "SELECT * FROM page_views WHERE ip_address = '$ip_address' AND user_agent = '$user_agent' AND page_url = '$page_url'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Visitor exists, update view_date and increase views_count
    $row = $result->fetch_assoc();
    $views_count = $row['views_count'] + 1;

    $update_sql = "UPDATE page_views SET view_date = '$view_date', views_count = $views_count WHERE ip_address = '$ip_address' AND user_agent = '$user_agent' AND page_url = '$page_url'";
    $conn->query($update_sql);
} else {
    // Visitor doesn't exist, insert new record
    $views_count = 1;

    $insert_sql = "INSERT INTO page_views (ip_address, user_agent, view_date, page_url, views_count) VALUES ('$ip_address', '$user_agent', '$view_date', '$page_url', $views_count)";
    $conn->query($insert_sql);
}

// Close database connection
$conn->close();

// Return image content
header("Content-type: image/png");
readfile("3_312887638-26197.png");  // Replace with your image path
