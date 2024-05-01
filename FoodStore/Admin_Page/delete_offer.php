<?php
require_once '../db_connect.php';

if (isset($_POST["delete"])) {
    $offerId = $_POST["offer_id"];

    // Retrieve offer information from the database
    $query = "SELECT * FROM tb_upload WHERE id = $offerId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Delete the database record
        $deleteQuery = "DELETE FROM tb_upload WHERE id = $offerId";
        mysqli_query($conn, $deleteQuery);

        // Delete the corresponding image file
        $imageFilePath = '../img/img-offer/' . $row['name'] . '.jpg';
        if (file_exists($imageFilePath)) {
            unlink($imageFilePath);
            echo '<script>alert("Offer deleted successfully.");</script>';
        } else {
            echo '<script>alert("Image file not found.");</script>';
        }
    } else {
        echo '<script>alert("Error retrieving offer information.");</script>';
    }
}
include'index.php';
?>
