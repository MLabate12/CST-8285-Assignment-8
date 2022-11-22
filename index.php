<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style3.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"/>
</head>

<body>
<p id="timeOfDay">Time of Day</p>
<div class="navbar">
  <a href="index.html"><i class="fa fa-home"></i> Home</a>
  <div class="subnav">
    <button class="subnavbtn"><i class="fa fa-barcode"></i> Products <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="currency.php">Currency Exchange</a>
      <a href="#Service2">Service 2</a>
    </div>
  </div>
  <div class="subnav">
    <button onclick="location.href='contact.html'" class="subnavbtn"><i class="fa fa-comments"></i> Contact Us <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="#French"><i class="flag-icon flag-icon-fr"></i> Contactez-Nous</a>
      <a href="#Italian"><i class="flag-icon flag-icon-it"></i> Contattaci</a>
    </div>
  </div>
  <a href="aboutme.html"><i class="fa fa-map-marker"></i> About</a>
</div>

<h1>Home Page</h1><br>
<h3>Welcome to the website. Please search for an item.</h3><br>

<script src="js2.jsx"></script>

<form method = "POST">
<input type="text" id="input" name="myInput" placeholder="Search for an item..">

    <?php
      include("init.php");

      if (isset($_POST['myInput'])){
        $searchInput = $_POST['myInput'];

      $servername = "localhost";
      $username = "root";
      $password = "password2";
      $dbname = "assignment8";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }?>

      
      
      <?php
      $sql = "SELECT * FROM Items WHERE Name LIKE '%{$searchInput}%' ";
      $result = $conn->query($sql)or die($conn->error);

        if ($result->num_rows > 0) {
          ?>
          <table id="Table">
          <tr class="header">   
          <th>Item No</th>
          <th>Name</th>
          <th>Type</th>
          <th>Make</th>
          <th>Model</th>
          <th>Brand</th>
          <th>Description</th>
          
          <?php
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID"]. "</td>";
            echo "<td>" . $row["Name"]. "</td>";
            echo "<td>" . $row["Type"]. "</td>";
            echo "<td>" . $row["Make"]. "</td>";
            echo "<td>" . $row["Model"]. "</td>";
            echo "<td>" . $row["Brand"]. "</td>";
            echo "<td>" . $row["Description"]. "</td>";
            echo "</tr>";
          }
        } else {
          echo "0 results";
        }

      $conn->close();
    }
      ?>

  </table>
</form>
</body>
</html>