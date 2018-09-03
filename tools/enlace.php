<?php 

	$enlace = mysqli_connect("127.0.0.1", "root", "", "appwallet");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//mysqli_close($enlace);

 ?>