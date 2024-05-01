<!DOCTYPE html>
<html lang="en">
<head>
    <title>BookStore</title>
    <link rel="stylesheet" type="text/css" href="StyleOffers.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }
        li img{
          height: 60vh;
        }

        h1 {
            color: #4285f4;
        }

        h3 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        h4 {
            margin: 0;
        }

        h5 {
            margin: 0;
            color: #777;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<?php
require_once '../db_connect.php';
$query = "SELECT * FROM `tb_upload` WHERE id=4";
$result = mysqli_query($conn, $query);
$id;
$name;
$desc;
$price;
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $desc = $row['Description'];
        $price = $row['price'];
        $name_tmp = $name . '.jpg';
    }
}
echo '<h1>Welcome To X Restaurant</h1>';
echo '<h3>Our Offer for today is ' . $name . '</h3>';
echo '<ul>
          <li><h4>' . $desc . '</h4></li>
          <li><h5>For only: $' . $price . '</h5></li>
          <li><img src="../img/img-offer/' . $name_tmp . '"> </li>';
?>
</body>
</html>
