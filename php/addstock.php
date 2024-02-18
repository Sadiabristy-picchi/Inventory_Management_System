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

if(isset($_POST['additem']))
{
$itemid = $_POST['itemid'];
$productname = $_POST['productname'];
$description = $_POST['description'];
$unit = $_POST['unit'];
$unitprice = $_POST['unitprice'];
$sql = "INSERT INTO stock (itemid,productname,description,unit,unitprice)
VALUES ('$itemid','$productname','$description','$unit','$unitprice')";
if ($conn->query($sql) === TRUE) 
    {
    echo "Item added successfully";
    header('location:../php/stockdisplay.php');
   

     } 
else {
  echo "Error in adding item " . $conn->error;
      }
}







$conn->close();
?>