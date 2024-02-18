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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body style="background-color:powderblue;">

  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Stock Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../html/home.html">Home</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="../php/stockdisplay.php">Stock</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../html/purchase.html">Purchase</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="../php/salemenu.php">Sales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../html/report.html">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container my-4">
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Description</th>
      <th scope="col">Unit</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM stock;";
    $result=mysqli_query($conn,$sql);
    if($result)
    { 
        while($row=mysqli_fetch_assoc($result))
        {     
             $itemid= $row['itemid'];
              $productname= $row['productname'];
               $description= $row['description'];
               $unit= $row['unit'];
              
              echo '<tr>
              <th scope="row">'.$itemid.'</th>
              <td>'.$productname.'</td>
              <td>'.$description.'</td>
              <td>'.$unit.'</td>
              
             <td>
            <button  class="btn btn-primary" >
            <a href="sale.php? updateid='.$itemid.'" class="text-light">sale</a>
            </button>
            
            </td>
            </tr>';
        }
      
      
    }
    
    ?>
    
  </tbody>
</table>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>