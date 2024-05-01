<?php
require_once '../db_connect.php';

if (isset($_POST["submit"])) {
    $numberOfOffers = isset($_POST["number_of_offers"]) ? (int)$_POST["number_of_offers"] : 0;

    if ($numberOfOffers <= 0) {
        echo '<script>alert("Please enter a valid number of offers.");</script>';
    } else {
        for ($i = 1; $i <= $numberOfOffers; $i++) {
            $name = $_POST["name"][$i];
            $description = $_POST["description"][$i]; // Added for description
            $price = isset($_POST["price"][$i]) ? (int)$_POST["price"][$i] : 0; // Added for price
            $imageFile = $_FILES["image"]["name"][$i];
            $tmpImageFile = $_FILES["image"]["tmp_name"][$i];

            // Perform necessary validations and database operations here
            // ...

            // Example: Inserting data into the database
            $query = "INSERT INTO tb_upload (id,name, description, price, image) VALUES ($i,'$name', '$description', $price, '$imageFile')";
            mysqli_query($conn, $query);

            // Move the uploaded file to the 'imgof' folder
            move_uploaded_file($tmpImageFile, '../img/img-offer/' . $name . '.jpg');

            echo "<script>alert('Offer $i uploaded successfully.');</script>";
        }
    }
}
?>

<html>
<head>
    <script>
        function updateOfferFields() {
            var numberOfOffers = document.getElementById("number_of_offers").value;
            var container = document.getElementById("offer_fields_container");

            // Clear existing fields
            container.innerHTML = "";

            for (var i = 1; i <= numberOfOffers; i++) {
                var nameLabel = document.createElement("label");
                nameLabel.textContent = "Name for Offer " + i + ":";
                container.appendChild(nameLabel);

                var nameInput = document.createElement("input");
                nameInput.type = "text";
                nameInput.name = "name[" + i + "]";
                nameInput.required = true;
                container.appendChild(nameInput);
                container.appendChild(document.createElement("br"));

                var descriptionLabel = document.createElement("label");
                descriptionLabel.textContent = "Description for Offer " + i + ":";
                container.appendChild(descriptionLabel);

                var descriptionInput = document.createElement("textarea");
                descriptionInput.name = "description[" + i + "]";
                descriptionInput.required = true;
                container.appendChild(descriptionInput);
                container.appendChild(document.createElement("br"));

                var priceLabel = document.createElement("label");
                priceLabel.textContent = "Price for Offer " + i + ":";
                container.appendChild(priceLabel);

                var priceInput = document.createElement("input");
                priceInput.type = "number";
                priceInput.name = "price[" + i + "]";
                priceInput.required = true;
                container.appendChild(priceInput);
                container.appendChild(document.createElement("br"));

                var imageLabel = document.createElement("label");
                imageLabel.textContent = "Image for Offer " + i + ":";
                container.appendChild(imageLabel);

                var imageInput = document.createElement("input");
                imageInput.type = "file";
                imageInput.name = "image[" + i + "]";
                imageInput.accept = ".jpg, .jpeg, .png";
                container.appendChild(imageInput);
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
</head>
<body>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="number_of_offers">Enter the number of offers:</label>
        <input type="number" name="number_of_offers" id="number_of_offers" required value="" onchange="updateOfferFields()"><br><br>
        <div id="offer_fields_container"></div>
        <button type='submit' name='submit'>Submit All Offers</button>
    </form>

    <?php
$query = "SELECT * FROM tb_upload";
$result = mysqli_query($conn, $query);
echo" <table border = 1 cellspacing = 0 cellpadding = 10>";
echo"  <tr>
<td>id</td>
<td>name</td>    
<td>description</td>   
<td>Price</td>   
<td>image</td>
<td>delet</td>
</tr>";
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        echo "<div>";
        echo "<td>". $row['id'] .'</td>';
        echo"<td>". $row['name'].'</td>';
        echo"<td>". $row['Description'].'</td>';
        echo"<td>". $row['price'].'</td>';
        echo "<td><img src='../img/img-offer//{$row['name']}.jpg' alt='{$row['name']}'></td>";
        echo "<form method='post' action='delete_offer.php'>";
        echo "<input type='hidden' name='offer_id' value='{$row['id']}'>";
        echo "<td><button type='submit' name='delete'>Delete</button></td>";
        echo "</form>";
        echo "</div>";
        echo"</tr>";
    }
    echo"</table>";
}
?>
<style>
    td{
         width:200;
          height:10vh;
    }
    img{ 
       
            width: 100%;
            height: 10vh;
            display: block;
        
    
    }
    </style>
</body>
</html>

