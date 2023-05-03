<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "ub-support";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);
  $conn->set_charset('utf8mb4');

  // Check connection
  if ($conn->connect_error) {
    die("Database connectie gefaald... " . $conn->connect_error);
  }

  if(!isset($_SESSION["darkmode"])){
    $_SESSION["darkmode"] = "checked";
  }
?> 