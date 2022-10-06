<?php 
    $hostname = "localhost";
    $username = "sam";
    $password = "test1234"; 
    $database = "Creative_database1";
    $con = mysqli_connect( $hostname,$username,$password,$database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }
?>