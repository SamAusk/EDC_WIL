<?php 
    $hostname = "127.0.0.1";
    $username = "sam";
    $password = "test1234"; 
    $database = "Creative_database1";
    $con = mysqli_connect( $hostname,$username,$password,$database);
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
?>