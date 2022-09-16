<?php

  //Connect to database
  $conn = mysqli_connect("localhost","root","","movie_store");

  //check if connected
  if(!$conn){
    echo "Connection error: ".mysqli_connect_error();
  }

?>