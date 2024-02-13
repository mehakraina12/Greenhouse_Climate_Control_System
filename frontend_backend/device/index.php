<?php
include_once('connection.php');

$query = "SELECT * FROM device_1 ORDER BY id DESC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tab.css">
</head>
<body>
  <div class="back-arrow">
    <a href="../Device_Dashboard/index.html" onclick="history.go(-1)">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkE_DCZ968NDAWLlp1PCJI_5l3BAklBLRmBcKZmpk&s" alt="Back" class="back-arrow-icon">
    </a>
  </div>

  <h1>History_Device1</h1>
  
  <div class="admin-button">
    <img src="moon.png" id="icon">
    <a href="../Admin_Login_Page/index.html" onclick="history.go(-1)">
      <button class="login-button">LogOut</button>
    </a>
  </div>

  <table>
    <thead>
      <tr>
        <th class="first-column">Serial No. </th>
        <th class="first-column1">Date/Time</th>
        <th class="first-column2">Temperature</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($rows = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $rows['Id'] . "</td>";
          echo "<td>" . $rows['date_time'] . "</td>";
          echo "<td>" . $rows['temp'] . "</td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>

  <?php
  // Close the connection
  $conn->close();
  ?>
  <script>
    var icon = document.getElementById("icon");
    icon.onclick = function(){
      document.body.classList.toggle("dark-theme");
      if (document.body.classList.contains("dark-theme")){
        icon.src="sun.png";
      }
      else{
        icon.src="moon.png";
      }
    }
  </script>
</body>
</html>
