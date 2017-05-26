<?php
include 'connParameters.php';

$con = mysqli_connect($host, $userName, $password, $dbName);

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, $dbName);
$sql="select * from movies where author,title,genre,price like" . $_GET["pattern"];
$result = mysqli_query($con, $sql);

header("Content-type: application/json");

echo json_encode($result);

mysqli_close($con);
?>