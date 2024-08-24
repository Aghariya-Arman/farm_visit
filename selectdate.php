<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>select your date</title>

  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>

  <div class="container">
    <div class="row mt-5  ">
      <div class="col-md-3"></div>
      <div class="col-md-6 border border-rounded">
        <h4 class="text-center">Select Visit Date</h4>
        <p class="text-center">Available Slot</p>
        <?php
        include 'connection.php';

        $sql = "SELECT order_id,city,adult,kids,infants,stays FROM customer_order ORDER BY order_id  DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['order_id'];
            echo '
                <span><center>adult:' . $row['adult'] . '</center></span>
                <span><center>kids:' . $row['kids'] . '</center></span>
                  <span><center>infants:' . $row['infants'] . '</center></span>
                   <span><center>stays:' . $row['stays'] . '</center></span>
           
      ';
          }
        }
        if (isset($_POST['submit'])) {

          $otime = $_POST['selected-date'];

          $sql = "update customer_order set  order_date='$otime' where order_id=$id";
          $result = mysqli_query($conn, $sql);
          header("location:wallet.php");
        }


        ?>


        <div class="row">
          <div class="col-md-3"></div>

          <div class="col-md-6 mt-5 mb-5">
            <form method="post" action="">
              <label for="date-picker">Select a Date:</label>
              <input type="date" id="date-picker" name="date-picker" min="">

              <!-- <label for="selected-date">Selected Date:</label> -->
              <center>
                <input type="hidden" id="selected-date" name="selected-date"><br>
                <button class="btn btn-primary" name="submit">get payment</button>
              </center>
            </form>
          </div>

        </div>



      </div>
    </div>
  </div>

</body>

<script>
  // Get today's date
  var today = new Date();
  var day = String(today.getDate()).padStart(2, '0');
  var month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
  var year = today.getFullYear();

  // Format the date in YYYY-MM-DD format
  var currentDate = year + '-' + month + '-' + day;

  // Set the min attribute of the date picker to today's date
  document.getElementById('date-picker').setAttribute('min', currentDate);

  // Get the date picker element
  var datePicker = document.getElementById('date-picker');

  // Add an event listener to capture the selected date
  datePicker.addEventListener('change', function() {
    var selectedDate = datePicker.value;
    // Display the selected date in the text box
    document.getElementById('selected-date').value = selectedDate;
  });
</script>