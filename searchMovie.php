<?php
include 'connParameters.php';

$con = mysqli_connect($host, $userName, $password, $dbName);

if (!$con) {
  die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, $dbName);
$sql="select * from movies where author like %" . $_GET["pattern"] .
"% or title like %" . $_GET["pattern"] .
"% or genre like %" . $_GET["pattern"] .
"% or price like %" . $_GET["pattern"] . "%";

$result = mysqli_query($con, $sql);

header("Content-type: application/json");

echo json_encode($result);

mysqli_close($con);
?>