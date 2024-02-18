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

if(isset($_POST['purchase']))
{
    $itemid = $_POST['itemid'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $unitprice = $_POST['unitprice'];
    $sql = "INSERT INTO purchase (itemid,productname,description,purchasedate ,unit,unitprice)
    VALUES ('$itemid','$productname','$description',NOW(),'$unit','$unitprice')";
    if ($conn->query($sql) === TRUE) 
        {
        echo "Purchased successfully";
        header('location:../php/stockdisplay.php');
    
   

         } 
    else {
      echo "Error in adding item " . $conn->error;
          }

     
          $count=0;

    $sql = "SELECT * FROM stock WHERE itemid='$itemid'&& productname='$productname'&& description='$description'&& unitprice='$unitprice'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result );
        if ($count==0) {
	    $sql = "INSERT INTO stock (itemid,productname,description,unit,unitprice)
         VALUES ('$itemid','$productname','$description','$unit','$unitprice')";
         mysqli_query($conn, $sql);
        }
    else {
	    $sql = "update stock set unit=unit+$unit WHERE itemid='$itemid'&& productname='$productname'&& description='$description'&& unitprice='$unitprice'";
        mysqli_query($conn, $sql);
         }
}









$conn->close();
?>