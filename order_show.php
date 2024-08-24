<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show_order</title>

  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>

</body>
<?php
include 'connection.php';

$sql = "SELECT city,adult,kids,infants,stays,order_date,wallet FROM customer_order ORDER BY order_id  DESC LIMIT 1;";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
}


?>



<div class="container">
  <div class="box justify-content-center row  mt-5">
    <div class="col-lg-6 border border-dark p-3">
      <h3 class="border-bottom  border-dark text-center"> YOUR ORDERD DETAIL</h3>
      <div class="field border-bottom">
        <h5>CITY :- <?php echo $row['city']; ?></h5>
      </div>
      <div class="field border-bottom ">
        <h5>ADULT :- <?php echo $row['adult']; ?></h5>
      </div>
      <div class="field border-bottom">
        <h5>KIDS :- <?php echo $row['kids']; ?></h5>
      </div>
      <div class="field border-bottom">
        <h5>INFANTS :- <?php echo $row['infants']; ?></h5>
      </div>
      <div class="field border-bottom">
        <h4>STAY :- <?php echo $row['stays']; ?></h4>
      </div>
      <div class="field border-bottom">
        <h4>ORDER_DATE :- <?php echo $row['order_date']; ?></h4>
      </div>
      <div class="field border-bottom">
        <h4>WALLET :- <?php echo $row['wallet']; ?></h4>
      </div>
      <div class="field text-center mt-3">
        <button class="btn btn-primary"><a href="index.html" style="color: white;">Back To Home</a></button>
      </div>
    </div>
  </div>
</div>

</html>