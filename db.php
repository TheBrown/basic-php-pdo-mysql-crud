<?php
$server = "localhost";
  $user = "root";
  $pass = "root";

  try {
    $conn = new PDO("mysql:host=$server; dbname=db_crud", $user, $pass);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected";


  } catch (PDOException $e) {
    echo "Failed: ".$e->getMessage();
  }

  ?>