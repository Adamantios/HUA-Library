<?php
include 'connParameters.php';

$con = mysqli_connect($host, $userName, $password, $dbName);

if (!$con) {
  die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, $dbName);

$sql="select * from 'books'";

$result = mysqli_query($con, $sql);

echo json_encode($result);

mysqli_close($con);
?>