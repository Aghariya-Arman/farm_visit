<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>customer details</title>

  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>

  <?php

  include 'connection.php';

  if (isset($_POST['submit'])) {

    $phno = $_POST['mobileno'];

    $sql = "select customer_name,customer_email,customer_city from customer where mobile_no='$phno'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['customer_name'];
        $email = $row['customer_email'];
        $city = $row['customer_city'];
      }
    } else {
      header("location:register.php");
    }
  }
  ?>

  <div class="container">
    <div class="box justify-content-center row  mt-5">
      <div class="col-lg-6 border border-dark p-3">
        <h3 class="border-bottom  border-dark text-center"> YOUR PERSONAL DETAIL</h3>
        <div class="field border-bottom">
          <h5>name :- <?php echo $name  ?></h5>
        </div>
        <div class="field border-bottom ">
          <h5>email :- <?php echo $email ?></h5>
        </div>
        <div class="field border-bottom">
          <h5>city :- <?php echo $city ?></h5>
        </div>


        <div class="field text-center mt-3">
          <button class="btn btn-primary"><a href="order.php" style="color: white;">PLACE YOUR ORDER</a></button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>