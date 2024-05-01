<?php
session_start();
require('../db_connect.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    $username = $conn->real_escape_string($username);
    

    $query = "SELECT * FROM admins WHERE email='$username'";
    $result = $conn->query($query);
    

    if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
        $hPassword = $row['password'];
        

        if ($password==$hPassword) {
            
            $_SESSION['user'] = $username;
            $current_user = $_SESSION['user'];
            echo("$current_user");
            header("Location: Controll.php"); 
        } else {
            echo "<div class='alert alert-danger'>Invalid password credentials</div>";
        }
    } else {
      
        echo "<div class='alert alert-danger'>Invalid user credentials</div>";
    }
}

// If the user is not already authenticated, display the login form, with fields for the username and password.
if (!isset($_SESSION['user'])) {
    echo '
    <div class="login-form">
        <h2>Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="email" required>
            </div>
            <div class="form-group">
                <label for "password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>';
}
?>