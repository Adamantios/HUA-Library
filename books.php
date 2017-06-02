<?php
include 'connParameters.php';

$con = mysqli_connect($host, $userName, $password, $dbName);

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, $dbName);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pattern = mysqli_real_escape_string($con, $_GET['pattern']);

    $sql="select * from books where author like '%" . $pattern .
                                               "%' or title like '%" . $pattern .
                                               "%' or genre like '%" . $pattern .
                                               "%' or price like '%" . $pattern . "%'";

    $result = mysqli_query($con, $sql);

    $rows = array();
    while($r = mysqli_fetch_assoc($result))
        $rows[] = $r;

    print json_encode($rows);
}

else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $genre = mysqli_real_escape_string($con, $_POST['genre']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $sql="insert into books (author, title, genre, price) values ('" .
            $author . "', '" . $title . "','" . $genre . "','" . $price . "')";

    if (!mysqli_query($con, $sql)) {
      die('Error: ' . mysqli_error($con));
    }

    $response = array();

    if ($rows)
        $response['message'] = 'The book has been successfully added.');
    else
        $response['message'] = 'Something went wrong. Please try again!');

    print json_encode($response);
}

mysqli_close($con);
?>