<?php
include 'connParameters.php';

$con = mysqli_connect($host, $userName, $password, $dbName);

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$author = mysqli_real_escape_string($con, $_GET['author']);
$title = mysqli_real_escape_string($con, $_GET['title']);
$genre = mysqli_real_escape_string($con, $_GET['genre']);
$price = mysqli_real_escape_string($con, $_GET['price']);

$sql="insert into books (author, title, genre, price) values ('" .
        $author . "', '" . $title . "','" . $genre . "','" . $price . "')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?>