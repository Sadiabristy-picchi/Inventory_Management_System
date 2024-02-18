<?php
session_start();
if(!$_SESSION['myDatabase'])
{

header('location:../php/logout.php');
}

?>
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
if(isset($_GET['deleteid']))
   {
    $itemid=$_GET['deleteid'];
    $sql="delete from stock where itemid=$itemid";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
    echo "Item deleted successfully";
    header('location:../php/stockdisplay.php');
   

     } 
   else {
        echo "Error in adding item " . $conn->error;
        }


  }
?>