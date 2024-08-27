<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ORDER</title>

  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <style>
    /* #counter {
      font-size: 24px;
      margin: 10px;
    } */

    button {
      font-size: 20px;
      margin: 5px;
      padding: 5px 15px;
    }

    .button-container .active {
      background-color: #007bff;
      color: white;
    }
  </style>
  <!-- <script src="validation.js"></script> -->
</head>

<body>
  <?php
  include 'connection.php';

  if (isset($_POST['submit'])) {
    // print_r($_POST['tentDisplay']);
    // exit;
    $city = $_POST['allcity'];
    if ($city == 'bangalore') {
      $stay = $_POST['modeText1'];
    }
    $adult = $_POST['counterValue'];
    $kids = $_POST['counterValue1'];
    $infant = $_POST['counterValue2'];
    $tent = $_POST['tentDisplay'];


    $sql = "insert into customer_order (city,adult,kids,infants,stays,tent) values ('$city','$adult',' $kids','$infant','$stay','$tent')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("location:selectdate.php");
    }
  }
  ?>

  <form method="post" action="">
    <div class="container">
      <div class="row mt-5">

        <div class="col-md-1"></div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">BANGLORE</h5>
              <input type="hidden" name="allcity" id="allcity" value="">
              <input type="button" name="city" value="banglore" onclick="handleClick('bangalore'); tooglep()" class="btn btn-primary" />
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CHENNAI</h5>
              <input type="button" name="city" value="chennai" onclick="handleClick('chennai'); tooglep1()" class="btn btn-success" />

            </div>
          </div>

        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">HYDRABAD</h5>
              <input type="button" name="city" value="hydrabad" onclick="handleClick('hyderabad'); tooglep1()" class="btn btn-warning" />
            </div>
          </div>
        </div>

      </div>

      <!-- second row  ADULT-->
      <div class="row mt-1">
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <p>Adult (Rs 500 per Adult)</p>
          Ages 13 or Above
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
          <div>
            <button type="button" onclick="decrement()">-</button>
            <span id="counter">Add</span>
            <button type="button" onclick="increment()">+</button>
            <input type="hidden" id="counterValue" name="counterValue" value="0">
          </div>
        </div>
      </div>
      <hr>

      <!-- third row  KIDS -->
      <div class="row mt-2" id="info1">
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <p>KIDS (Rs 250 per kid)</p>
          Ages 5-12 year
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
          <div>
            <button type="button" onclick="decrement1()">-</button>
            <span id="counter1">Add</span>
            <button type="button" onclick="increment1()">+</button>
            <input type="hidden" id="counterValue1" name="counterValue1" value="0">
          </div>
        </div>
      </div>
      <hr>

      <!-- fourth row  INFANT-->
      <div class="row mt-2" id="info2">
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <p>INFANTS</p>
          Ages 5 or below
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
          <div>
            <button type="button" onclick="decrement2()">-</button>
            <span id="counter2">Add</span>
            <button type="button" onclick="increment2()">+</button>
            <input type="hidden" id="counterValue2" name="counterValue2" value="0">
          </div>
        </div>
      </div>
      <hr>

      <!-- fifth row -->
      <div class="row mt-2" id="info3">
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <p>No.Of days of stay</p>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
          <div class="container">
            <div class="button-container">
              <button type="button" class="button active" id="dayButton" onclick="change_day();showtent_day()">Day</button>
              <span class="text" id="modeText">day</span>
              <input type="hidden" id="modeText1" name="modeText1" value="day">
              <button type="button" class="button" id="nightButton" onclick="change_day(); showtent_night()">Night</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-4" id="tent4">
        <div class="col-md-3"></div>
        <div class="col-md-4">
          <!-- <label for="">TENT AVAILABLE</label> -->
          <!-- <input type="radio" name="nstay" id="nstay" value="tent" /><br> -->
          <input type="text" id="tentDisplay" name="tentDisplay">
          <!-- <div id="tentDisplay"></div> -->
        </div>
      </div>

      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
          <button type="submit" class="btn btn-primary" name="submit">CONTINUE</button>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
          <h4>View Tour Guide<a href="e1.pdf">Open</a></h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
          <p><b>TOTAL PAYMENT HERE :-</b><span id="total"></span></p>
        </div>
      </div>
    </div>
  </form>

  <script>
    //day night button
    const dayButton = document.getElementById('dayButton');
    const nightButton = document.getElementById('nightButton');
    const modeText = document.getElementById('modeText');
    const modeText1 = document.getElementById('modeText1');
    const maxCount = 10;
    // let fvalue = 0;

    function change_day() {
      if (modeText.textContent === 'day') {
        dayButton.classList.remove('active');
        nightButton.classList.add('active');
        modeText.textContent = 'night';
        modeText1.value = 'night';
      } else {
        nightButton.classList.remove('active');
        dayButton.classList.add('active');
        modeText.textContent = 'day';
        modeText1.value = 'day';
      }
    }

    // increment decrement for adult
    let adult = 0;
    let kids = 0;

    function increment() {
      const counter = document.getElementById('counter');
      const counterValue = document.getElementById('counterValue');
      let value = parseInt(counterValue.value);
      if (value < maxCount) {
        value++;
        counterValue.value = value;
        counter.textContent = value;
        adult = value * 500;
        final_count(adult, kids);

        // fvalue = value;

      }
    }

    function decrement() {
      const counter = document.getElementById('counter');
      const counterValue = document.getElementById('counterValue');
      let value = parseInt(counterValue.value);
      if (value > 0) {
        value--;
        counterValue.value = value;
        counter.textContent = value;
        adult = value * 500;
        final_count(adult, kids);

        // fvalue = value;

      }
    }

    // increment decrement for child
    function increment1() {
      const counter1 = document.getElementById('counter1');
      const counterValue1 = document.getElementById('counterValue1');
      let value = parseInt(counterValue1.value);
      if (value < maxCount) {
        value++;
        counterValue1.value = value;
        counter1.textContent = value;
        kids = value * 250;
        final_count(adult, kids);

        // fvalue = value;

      }
    }

    function decrement1() {
      const counter1 = document.getElementById('counter1');
      const counterValue1 = document.getElementById('counterValue1');
      let value = parseInt(counterValue1.value);
      if (value > 0) {
        value--;
        counterValue1.value = value;
        counter1.textContent = value;
        kids = value * 250;
        final_count(adult, kids);
      }
    }

    // increment decrement for infants
    function increment2() {
      const counter2 = document.getElementById('counter2');
      const counterValue2 = document.getElementById('counterValue2');
      let value = parseInt(counterValue2.value);
      if (value < maxCount) {
        value++;
        counterValue2.value = value;
        counter2.textContent = value;

        // fvalue = value;
      }
    }

    function decrement2() {
      const counter2 = document.getElementById('counter2');
      const counterValue2 = document.getElementById('counterValue2');
      let value = parseInt(counterValue2.value);
      if (value > 0) {
        value--;
        counterValue2.value = value;
        counter2.textContent = value;

        // fvalue = value;
      }
    }

    //  hide show for city vise
    function tooglep() {
      let p = document.getElementById("info3");
      if (p.style.display == "block") {
        // console.log(p.style.display);
        p.style.display = "block";
      } else {
        p.style.display = "block";

      }
    }

    function tooglep1() {
      let p = document.getElementById("info3");
      if (p.style.display == "none") {
        p.style.display = "none";
      } else {
        p.style.display = "none";
      }
    }


    // tent show 
    let p = document.getElementById("tent4");
    p.style.display = "none";

    function showtent_day() {
      let p = document.getElementById("tent4");
      // p.style.display = "none";
      if (p.style.display == "none") {
        p.style.display = "none";
      } else {
        p.style.display = "none";
      }
    }

    function showtent_night() {
      let p = document.getElementById("tent4");
      if (p.style.display == "block") {
        p.style.display = "block";
      } else {
        p.style.display = "block";
      }

      const totalpeople = (adult / 500) + (kids / 250);
      updateTentDisplay(totalpeople);
    }


    // slect city
    function handleClick(city) {
      document.getElementById("allcity").value = city;
    }


    // total count of  payment

    let final_total = 0;

    function final_count(adult, kids) {
      final_total = adult + kids;
      // console.log(final_total);
      document.getElementById("total").innerHTML = final_total;

    }

    //show tent value
    function updateTentDisplay(totalPeople) {
      let tentsRequired = 1;
      tentsRequired = Math.ceil(totalPeople / 3);
      document.getElementById('tentDisplay').value = tentsRequired + "->Tent";

    }
  </script>
</body>

</html>