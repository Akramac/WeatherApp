<?php
include_once "dbh.php";
$city=$_GET['city'];

$sql="INSERT INTO cities (city) VALUES ('$city')";
mysqli_query($conn,$sql);
$mycity="http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa";
header("Location: ".$mycity);
 ?>
