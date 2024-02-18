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

if (empty($_POST["firstname"])) {
    die("Name is required");
}
if (empty($_POST["lastname"])) {
    die("Name is required");
}
if ( ! filter_var($_POST["gmail"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 5) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["conpassword"]) {
    die("Passwords must match");
    
}
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$gmail = $_POST['gmail'];;
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];
//$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO Admin (firstname,lastname,username,gmail, password)
VALUES ('$firstname','$lastname','$username','$gmail', '$password')";
if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['username'] = '$username';
$_SESSION['password']   = '$password';
   header('location:../html/home.html');

} 
else {
  echo "Wrong id or password " . $conn->error;
}


$conn->close();
?>