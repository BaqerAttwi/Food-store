<?php
require_once '../db_connect.php';

// Handle feedback deletion
if (isset($_POST["delete"])) {
    $feedbackId = $_POST["feedback_id"];
    $deleteQuery = "DELETE FROM feedback WHERE id = $feedbackId";
    mysqli_query($conn, $deleteQuery);
}

// Fetch feedback from the database
$query = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Feedback</title>
   
</head>
<body>
        <h1>Admin - Feedback</h1>

        <?php
        if ($result) {
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
            echo "<tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    <th>Action</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . '</td>';
                echo "<td>" . $row['email'] . '</td>';
                echo "<td>" . $row['feedback'] . '</td>';
                echo "<td>
                        <form method='post' action='admin_feedback.php'>
                            <input type='hidden' name='feedback_id' value='{$row['id']}'>
                            <button type='submit' name='delete'>Delete</button>
                        </form>
                      </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No feedback available.";
        }
        ?>
        <a href="index.php">Back to Admin Dashboard</a>
    <style> td {
            width: 200px;
            height: 10vh;
        }</style>
</body>
</html>
