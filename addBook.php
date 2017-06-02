<?php
include 'connParameters.php';

$con = mysqli_connect($host, $userName, $password, $dbName);

if (!$con) {
  die('Could not connect: ' . mysqli_connect_error());
}

$author = mysqli_real_escape_string($con, $_POST['author']);
$title = mysqli_real_escape_string($con, $_POST['title']);
$genre = mysqli_real_escape_string($con, $_POST['genre']);
$price = mysqli_real_escape_string($con, $_POST['price']);

$sql="insert into books (author, title, genre, price) values ('" .
        $author . "', '" . $title . "','" . $genre . "','" . $price . "')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}

echo "1 record added";

mysqli_close($con);
?>