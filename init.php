<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "ub-support";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Database connectie gefaald... " . $conn->connect_error);
}
?> 