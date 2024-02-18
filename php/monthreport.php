
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
    <title>Product Information Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body style="background-color:powderblue;">

  <nav class="navbar navbar-expand-lg bg-light ">
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
        <a class="nav-link" href="../php/salemenu.php">Sales</a>
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

  <div class="container ">
 <h4 style="text-align:center;">Purchase Report</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      
      <th scope="col">Purchase Date</th>
      <th scope="col">Unit</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
              $datee = $_POST["date"]; 
              //echo $datee;
              $dateee = date("m-Y", strtotime($datee));
              
              //echo $dateee;
              $month=date("m", strtotime($datee));
             $year= date("Y", strtotime($datee));

             //echo $year;
              //SELECT * FROM table WHERE MONTH(date_column) = 3
    //$sql="SELECT * FROM purchase where purchasedate='$datee'";
    $sql="SELECT * FROM purchase WHERE MONTH(purchasedate) ='$month' AND YEAR(purchasedate) =' $year'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result );
   
    if($result)
    { 
        $count=0;
        while($row=mysqli_fetch_assoc($result))
        {     
             $itemid= $row['itemid'];
              $productname= $row['productname'];
               $description= $row['description'];
               $purchasedate= $row['purchasedate'];
               $unit= $row['unit'];
              $unitprice= $row['unitprice'];
              echo '<tr>
              <th scope="row">'.$itemid.'</th>
              <td>'.$purchasedate.'</td>
              <td>'.$unit.'</td>
              <td>'.$unitprice.'</td>
             <td>'.$unit*$unitprice.'</td>
             </tr>';
             $count=$count+($unit*$unitprice);
        }
      
      
    }
    
    ?>
    
  </tbody>
</table>
<?php
echo 'Total Purchase cost='.$count;
?>
  </div>
  <div class="container ">
 <h4 style="text-align:center;">Sale Report</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Sale Date</th>
      <th scope="col">Unit</th>
      <th scope="col">Sale Price</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
              $orgDate = $_POST["date"]; 
              //echo $orgDate;
              $datee = date("Y-m-d", strtotime($orgDate));
              
            
    $sql=$sql="SELECT * FROM sale WHERE MONTH(saledate) ='$month' AND YEAR(saledate) =' $year'";
    $result1=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result1 );
  
    if($result1)
    {   $count=0;
        while($row=mysqli_fetch_assoc($result1))
        {     
             $itemid= $row['itemid'];
              //$productname= $row['productname'];
               //$description= $row['description'];
               $saledate= $row['saledate'];
               $unit= $row['unit'];
              $saleprice= $row['saleprice'];
              echo '<tr>
              <th scope="row">'.$itemid.'</th>
              <td>'.$saledate.'</td>
              <td>'.$unit.'</td>
              <td>'.$saleprice.'</td>
              <td>'.$unit*$saleprice.'</td>
             </tr>';
              $count=$count+($unit*$unitprice);
        }
      
      
    }
    
    ?>
    
  </tbody>
</table>
<?php
echo 'Total Purchase cost='.$count;
?>
<div class="text-center">
  <button onclick="window.print()" class="btn btn-primary">Print</button>
  </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>