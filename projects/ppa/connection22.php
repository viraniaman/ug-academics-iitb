<?php
$servername = "10.105.177.5";
$username = "ugacademics";
$password = "ug_acads";

// Create connection
$conn = mysqli_connect($servername, $username, $password, "ugacademics");

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
    
?>
