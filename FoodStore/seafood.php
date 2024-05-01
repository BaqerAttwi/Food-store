<?php
include("db_connect.php");
$query = "SELECT * FROM seafood";
$result = mysqli_query($conn, $query);
echo'<link rel="stylesheet" type="text/css" href="StyleP.css">';
if ($result) {
    echo'<link rel="stylesheet" type="text/css" href="StyleP.css">';
echo "<div class='meat-item'>";
echo'<a href="index.php"><h3 style="">return-home</h3></a>';
echo "</div>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='meat-item'>";
        echo "<p>Price: $" . $row['Price'] . "</p>";
        echo "<p>Name: " . $row['Name'] . "</p>";
        echo "<p>Description: " . $row['Description'] . "</p>";
        echo "<img src='img/img-categories/{$row['Name']}.jpg' alt='{$row['Name']}'>";
        echo "</div>";
    }
}
?>
