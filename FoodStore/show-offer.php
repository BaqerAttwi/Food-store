<?php
require_once 'db_connect.php';

$query = "SELECT * FROM tb_upload";
$result = $conn->query($query);
$ar_names = array();

// Check if the query was successful
if ($result) {
    // Fetch data and store image names in the array
    while ($row = $result->fetch_assoc()) {
        $ar_names[] = $row['name'];
    }
    // Free result set
    $result->free();
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
echo '<link rel="stylesheet" type="text/css" href="StyleOffers.css">';
// Display images using the array
if(count($ar_names) > 4 || count($ar_names) == 0) {
    echo '<div class="box" id="image-container">';
    echo '<span style="--i:1"><img src="img/img-offer-main/OIP (1).jpg"></span>';
    echo '<span style="--i:3"><img src="img/img-offer-main/OIP (1).jpg"></span>';
    echo '<span style="--i:5"><img src="img/img-offer-main/OIP (1).jpg"></span>';
    echo '<span style="--i:7"><img src="img/img-offer-main/OIP (1).jpg"></span>';
    echo '</div>';
} else {
    $offer_Pg=['offer1.php','offer2.php','offer3.php','offer4.php'];
    echo '<div class="box" id="image-container">';
    $tmp = 1;
    $tempT=0;
    for ($i = 0; $i < count($ar_names); $i++) {
        $name = $ar_names[$i];
        $name_tmp = $name . '.jpg';
      
        echo '<span style="--i:' . $tmp . '">';
        echo '<img src="img/img-offer/' . $name_tmp . '"/><a href="offer/'.$offer_Pg[$tempT].'"></a>';
      
        echo '</span>';
        echo '<span style="--i:' . $tmp . '"><a href="offer/'.$offer_Pg[$tempT].'"></a></span>';
       
        echo"<style>.box span a{
            width: 100%;
            height: 100%;
            padding: 80%;
        }</style>";
        $tmp += 2;
        $tempT++;
    }
    echo "</div>";
}
?>
