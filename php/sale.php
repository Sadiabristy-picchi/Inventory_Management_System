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
              $availableunit= $row['unit'];
              
          

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sale Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <div class="container my-5">
    <form method="post" action="../php/salel.php">
    <div class="mb-3">
    <label >Product Id</label>
    <input type="text" class="form-control" placeholder=" Product ID" name="itemid" value=<?php echo $itemid;?>>
    
  </div>

 <div class="mb-3">
    <label >Available Unit</label>
    <input type="text" class="form-control" placeholder="Available unit"  value=<?php echo $availableunit;?> >
   </div> 
  
   <div class="mb-3">
    <label >Selling Unit</label>
    <input type="text" class="form-control" placeholder="total unit" name="unit" >
   </div> 
   <div class="mb-3">
    <label >Selling Price</label>
    <input type="text" class="form-control" placeholder="Per unit selling price" name="saleprice" >
   </div> 
  <button type="submit" class="btn btn-primary" name="sale">sale</button>
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>




