<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDatabase";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM Admin WHERE username='$username'and password='$password'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result))
{
   
         session_start();
         
    $_SESSION['myDatabase']='true';
    header('location:../html/home.html');
    
    
}
else {
    echo "wrong username or password";
   header('location:../html/login.html?error=wrong username or password');
    }

mysqli_close($conn);
?>
