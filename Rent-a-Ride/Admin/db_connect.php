<?php
$servername = "localhost"; // Your MySQL server (usually "localhost" if it's on the same server)
$username ="root" ; // Your MySQL username
$password =""; // Your MySQL password
$database = "rent_a_ride"; // Your database name

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>