<?php

require_once '../db_connect.php';
if (isset($_POST["delete"])) {
$offerId = $_POST["offer_id"];
$offer_type = $_POST["offer_type"];
if($offer_type==1) {
    $query = "SELECT * FROM meat WHERE ID = $offerId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Delete the database record
        $deleteQuery = "DELETE FROM meat WHERE ID = $offerId";
        mysqli_query($conn, $deleteQuery);

        // Delete the corresponding image file
        $imageFilePath = '..../img/img-categories/' . $row['Name'] . '.jpg';
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
elseif($offer_type==2) {
    $query = "SELECT * FROM chicken WHERE ID = $offerId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Delete the database record
        $deleteQuery = "DELETE FROM chicken WHERE ID = $offerId";
        mysqli_query($conn, $deleteQuery);

        // Delete the corresponding image file
        $imageFilePath = '..../img/img-categories/' . $row['Name'] . '.jpg';
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
elseif($offer_type==3) {
    $query = "SELECT * FROM seafood WHERE ID = $offerId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Delete the database record
        $deleteQuery = "DELETE FROM seafood WHERE ID = $offerId";
        mysqli_query($conn, $deleteQuery);

        // Delete the corresponding image file
        $imageFilePath = '..../img/img-categories/' . $row['Name'] . '.jpg';
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
elseif ($offer_type==4) {
    $query = "SELECT * FROM drinks WHERE ID = $offerId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Delete the database record
        $deleteQuery = "DELETE FROM drinks WHERE ID = $offerId";
        mysqli_query($conn, $deleteQuery);

        // Delete the corresponding image file
        $imageFilePath = '../img/img-categories/' . $row['Name'] . '.jpg';
        if (file_exists($imageFilePath)) {
            unlink($imageFilePath);
            echo '<script>alert("Offer deleted successfully.");</script>';
        } else {
            echo '<script>alert("Image file not found.");</script>';
        }
    } else {
        echo '<script>alert("Error retrieving offer information.");</script>';
    }
    include'Drinks.php';
}
}

?>