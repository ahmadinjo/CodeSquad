<?php

  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "499172";
  $dbname = "dbtest";

  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>