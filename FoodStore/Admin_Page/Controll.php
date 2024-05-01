<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-page</title>
    <link rel="stylesheet" type="text/css" href="StyleAdmin.css">
    <style>
        body {
         background-color:blue;
            font-family: Arial, sans-serif;
          
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }

        h1 {
            color: #4285f4;
            margin-top: 50px;
        }

        .align{
         
          margin-left: 40vw;
        }

        h4 {
          text-shadow: 0 0 20px white,0 0 40px white;
            margin: 10px 0;
            padding: 10px;
            color: black;
            width: 200px;
            text-decoration: none;
            display: block;
            border-radius: 10%;
        }

        a {
        
            text-decoration: none;
        }

        a:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>You're in the admin page</h1>
    <div class="align">
      <ul>
        <li>
    <a href="index.php"><h4>ADD/Delet offers</h4></a></li>
    <li><a href="MeatMeal.php"><h4>ADD/Delet Meat</h4></a></li>
    <li><a href="ChickenMeal.php"><h4>ADD/Delet Chicken</h4></a></li>
    <li><a href="SeaFood.php"><h4>ADD/Delet Sea Food</h4></a></li>
    <li><a href="Drinks.php"><h4>ADD/Delet Drinks</h4></a></li>
    <li><a href="admin_feedback.php"><h4>see/Delet feedback</h4></a></li>
      </ul>
      </div>
</body>
</html>
