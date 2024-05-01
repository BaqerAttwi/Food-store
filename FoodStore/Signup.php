<?php
// Handle the form submission and database interaction
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Perform SQL insertion
    $sql = "INSERT INTO userinfo (fullname, email, phonenumber, password) VALUES ('$fullname', '$email', '$phonenumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Return a success message (you can customize this JSON response)
        include"index.php";
        
    } else {
        // Return an error message (you can customize this JSON response)
        echo json_encode(["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
    // Close the database connection
    $conn->close();
} else {
    // Handle other HTTP methods or direct access to the script
    http_response_code(405); // Method Not Allowed
    echo json_encode(["success" => false, "message" => "Method not allowed"]);
}

?>
