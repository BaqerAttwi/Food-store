<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>

<?php
require_once 'db_connect.php';
$query = "SELECT * FROM chicken";
$result = mysqli_query($conn, $query);
echo"<div class='cardstoalign'>";
if ($result) {
  $count=0;
  while ($row = mysqli_fetch_assoc($result)) {
    if ($count>3) { break;}else{
    echo '<div class="card-container">';
    echo '<div class="card">';
    echo '<div class="face front">';
    echo "<img src='img/img-categories/{$row['Name']}.jpg' alt='{$row['Name']}'>";
    echo "<div class='name'>{$row['Name']}</div>";
    echo '</div>';
    echo '<div class="face back">';
    echo "<div class='price'>Price: {$row['Price']}</div>";
    echo '<div class="description">'.'<div class="animation-element">.' . nl2br($row['Description']) . '</div></div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    $count++;}
  }
  echo '<div class="Next">';
  echo '<a href="chicken.php"><h3>Click to view more....</h3></a><br>';
  echo '</div>';
  echo '</div>';
}
?>

</body>
</html>
