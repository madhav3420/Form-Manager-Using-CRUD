<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="cruds";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  echo "Connection failed: ";
}

?>