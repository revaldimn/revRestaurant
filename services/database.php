<?php
  $hostname = "localhost";
  $database_name = "restaurant";
  $username = "root";
  $password = "";

  $db = mysqli_connect($hostname, $username, $password, $database_name);

  if ($db->connect_error) {
    echo "Koneksi Database Gagal !";
    die();
  }