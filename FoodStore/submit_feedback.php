<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db_connect.php'; // Include your database connection file

    // Sanitize user input
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $feedback = mysqli_real_escape_string($conn, $_POST["feedback"]);

    // Insert feedback into the database
    $query = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Feedback submitted successfully!");</script>';
        include 'index.php';
    } else {
        echo '<script>alert("Error submitting feedback. Please try again.");</script>';
    }

    mysqli_close($conn);
}

?>
