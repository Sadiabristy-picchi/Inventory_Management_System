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
$sql = "CREATE TABLE stock (
itemid INT (30) NOT NULL PRIMARY KEY,
productname VARCHAR(30) NOT NULL ,
description VARCHAR(500) NOT NULL,
unit INT(15) NOT NULL ,
unitprice INT(15) NOT NULL



)";

if ($conn->query($sql) === TRUE) {
  echo "Table stock successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>