<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
 .cardstoalign {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      align-content: space-around;
    }

    .card-container {
      border: 3px groove darkblue;
      width: 250px;
      height: 300px;
      margin-left: 1vw;
      border-radius: 10px;
      overflow: hidden;
      background-color: rgba(255, 255, 255, 0);/* Semi-transparent white */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .next{
      width: 250px;
      height: 300px;
      margin-left: 9vw
      border-radius: 10px;
      overflow: hidden;
      background-color: rgba(255, 255, 255, 0);/* Semi-transparent white */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }
    
    .card-container:hover {
      transform: scale(1.05);
    }

    .card {
      width: 100%;
      height: 100%;
      transform-style: preserve-3d;
      transition: transform 0.6s;
      cursor: pointer;
      position: relative;
    }

    .card:hover {
      transform: rotateY(180deg);
    }
    div.Next a h3{
      margin-top: 50%; 
      text-align: center;
    }
    .card .face {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
      box-sizing: border-box;
      overflow: hidden;
      text-align: center;
    }

    .card .front {
      background: linear-gradient(rgba(46, 204, 113, 0.8), rgba(255, 255, 255, 0);); /* Glass effect gradient */
      color: white;
    }

    .card .back {
      background: linear-gradient(rgba(46, 204, 113, 0.8), rgba(255, 255, 255, 0))); /* Glass effect gradient */
      transform: rotateY(180deg);
      color: white;
      animation: fadeIn 1s ease-in-out; /* Apply fade-in animation */
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
/* img {  border: 3px groove darkblue;} */
    .face img {
      width: 100%;
      height: 70%;
      object-fit: cover;
    }

    .name {
      
    text-shadow: 0 0 20px lightblue,0 0 40px lightblue;
      font-size: 18px;
      margin-top: 3vh;
    }

    .price {
      font-size: 16px;
      margin-bottom: 5px;
    }
    .description {
      font-size: 14px;
      overflow-y: auto;
      max-height: 70px;
      text-shadow: 0 0 20px #b604a1,0 0 40px #c910e1;
    }
  </style>
</head>
<body>

<?php
require_once 'db_connect.php';
$query = "SELECT * FROM meat";
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
  echo '<a href="Meat.php"><h3>Click to view more....</h3></a><br>';
  echo '</div>';
  echo '</div>';
}
?>

</body>
</html>
