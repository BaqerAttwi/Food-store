<?php
require_once '../db_connect.php';

if (isset($_POST["submit"])) {
    $numberOfOffers = isset($_POST["number_of_offers"]) ? (int)$_POST["number_of_offers"] : 0;

    if ($numberOfOffers <= 0) {
        echo '<script>alert("Please enter a valid number of offers.");</script>';
    } else {
        for ($i = 1; $i <= $numberOfOffers; $i++) {
            $id = mysqli_real_escape_string($conn, $_POST["id"][$i]);
            $name = mysqli_real_escape_string($conn, $_POST["name"][$i]);
            $description = mysqli_real_escape_string($conn, $_POST["description"][$i]);
            $price = isset($_POST["price"][$i]) ? (int)$_POST["price"][$i] : 0;
            $imageFile = $_FILES["image"]["name"][$i];
            $tmpImageFile = $_FILES["image"]["tmp_name"][$i];

            // Perform necessary validations and database operations here
            // ...

            // Example: Inserting data into the database
            $query = "INSERT INTO meat (id, price, name, image, description) VALUES ('$id', $price, '$name', '$imageFile', '$description')";
            mysqli_query($conn, $query);

            // Move the uploaded file to the 'imgof' folder
            move_uploaded_file($tmpImageFile, '../img/img-categories/' . $name . '.jpg');

            echo "<script>alert('Offer $i uploaded successfully.');</script>";
        }
    }
}
?>

<!-- The form in HTML -->
<html>
<head>
    <script>
        function updateOfferFields() {
            var numberOfOffers = document.getElementById("number_of_offers").value;
            var container = document.getElementById("offer_fields_container");

            // Clear existing fields
            container.innerHTML = "";

            for (var i = 1; i <= numberOfOffers; i++) {
                var idLabel = document.createElement("label");
                idLabel.textContent = "ID for Offer " + i + ":";
                container.appendChild(idLabel);

                var idInput = document.createElement("input");
                idInput.type = "text";
                idInput.name = "id[" + i + "]";
                idInput.required = true;
                container.appendChild(idInput);
                container.appendChild(document.createElement("br"));

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
    
    <!-- The table to display existing offers -->
    <?php
    $query = "SELECT * FROM meat";
    $result = mysqli_query($conn, $query);

    echo "<table border='1' cellspacing='0' cellpadding='10'>";
    echo "<tr>
        <td>id</td>
        <td>name</td>
        <td>description</td>
        <td>Price</td>
        <td>image</td>
        <td>delete</td>
    </tr>";

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td>";
            echo "<td>{$row['Price']}</td>";
            echo "<td>{$row['Name']}</td>";
            echo "<td>{$row['Description']}</td>";
            echo "<td><img src='../img/img-categories/{$row['Name']}.jpg' alt='{$row['Name']}'></td>";
            echo "<td>
                    <form method='post' action='delet_Catagories.php'>
                        <input type='hidden' name='offer_id' value='{$row['ID']}'>
                        <input type='hidden' name='offer_type' value='1'>
                        <button type='submit' name='delete'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Styles for the table -->
    <style>
        td {
            width: 200px;
            height: 10vh;
        }

        img {
            width: 100%;
            height: 10vh;
            display: block;
        }
    </style>
    <a href="index.php">Back to Admin Dashboard</a>
</body>
</html>
