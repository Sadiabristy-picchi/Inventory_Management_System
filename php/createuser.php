<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDatabase";

// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Admin (
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL PRIMARY KEY,
gmail VARCHAR(50) NOT NULL,
password VARCHAR(30) NOT NULL


)";

if ($conn->query($sql) === TRUE) {
  echo "Table Admin successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>