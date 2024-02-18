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
$sql = "CREATE TABLE sale (
sl INT(15) AUTO_INCREMENT primary key,
itemid INT (15) ,
saledate  date NOT NULL ,
unit INT(15) NOT NULL ,
saleprice INT(15) NOT NULL



)";

if ($conn->query($sql) === TRUE) {
  echo "Table sell successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>