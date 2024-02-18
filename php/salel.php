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

if(isset($_POST['sale']))
{
    $itemid = $_POST['itemid'];
    
    $unit = $_POST['unit'];
    $saleprice = $_POST['saleprice'];
    $sql = "INSERT INTO sale (itemid,saledate ,unit,saleprice)
    VALUES ('$itemid',NOW(),'$unit','$saleprice')";
    if ($conn->query($sql) === TRUE) 
        {
        echo "sold successfully";
        header('location:../php/salemenu.php');
    
   

         } 
    else {
      echo "Error in selling item " . $conn->error;
          }

     
          $count=0;

    $sql = "SELECT * FROM stock WHERE itemid='$itemid'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result );
        if ($count==1) {
	    $sql = "update stock set unit=unit-$unit WHERE itemid='$itemid'";
        mysqli_query($conn, $sql);
        }
    else {
	     echo "product is unavailable";
         }
}
$conn->close();
?>