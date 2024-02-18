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
$itemid =$_GET['updateid'];
$sql="SELECT * FROM stock where itemid=$itemid";
    $result=mysqli_query($conn,$sql);
    
        $row=mysqli_fetch_assoc($result);
              $itemid = $row['itemid'];
              $productname= $row['productname'];
               $description= $row['description'];
               $unit= $row['unit'];
              $unitprice= $row['unitprice'];
          
if(isset($_POST['update']))
 {  
     $itemid = $_POST['itemid'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $unitprice = $_POST['unitprice'];
    $sql = "INSERT INTO stock ( itemid,productname,description,unit,unitprice)
    VALUES ('$ itemid,$productname','$description','$unit','$unitprice')";

    $sql="update  stock set itemid=$itemid,productname='$productname',description ='$description',
    unit =$unit,unitprice =$unitprice where itemid=$itemid";
        $result=mysqli_query($conn,$sql);
        if($result)
            {
            echo "Item updated successfully";
            header('location:../php/stockdisplay.php');
   

            } 
       else {
            echo "Error in adding item " . $conn->error;
            }
 }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <div class="container my-5">
    <form method="post">
    <div class="mb-3">
    <label >Product Id</label>
    <input type="text" class="form-control" placeholder="Enter Product ID" name="itemid" value=<?php echo $itemid;?>>
    
  </div>

  <div class="mb-3">
    <label >Product Name</label>
    <input type="text" class="form-control" placeholder="Enter Product name" name="productname" value=<?php echo "$productname";?>>
    
 
<div class="mb-3">
    <label >Unit</label>
    <input type="text" class="form-control" placeholder="Write Product Description" name="description"value=<?php echo "$description";?>>
   </div> 
   <div class="mb-3">
    <label >Unit</label>
    <input type="text" class="form-control" placeholder="total unit" name="unit" value=<?php echo $unit;?>>
   </div> 
   <div class="mb-3">
    <label >Unit Price</label>
    <input type="text" class="form-control" placeholder="Per unit price" name="unitprice" value=<?php echo $unitprice;?>>
   </div> 
  <button type="submit" class="btn btn-primary" name="update">update</button>
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>




