<html>
    <header>
        <title>FoodStore</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="NavBar/NAVBAR.css">
        <link rel="stylesheet" type="text/css" href="StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="bubleeffect.css">
        <link rel="stylesheet" type="text/css" href="Responsive.css">
        <link rel="stylesheet" type="text/css" href="Footerstyle.css">
      </header>
      <style>button a{
        color: lightblue;
      }</style>
    <body>
    <div class="row">
      <div class="col-">
        <div class="col-s-12 ">
          <div class="col-m-12">
            <div class="col-l-12">
        <nav class="navbar">
      <button onclick="toggleMenu()" class="burger"></button>
      <button class="button">FoodStore</button>
      <div class="dropdowns" style="">
        <div class="dropdown">
          <button class="button">
            FoodCatagory
            <img src="NavBar/chevron.svg" />
          </button>
          <div class="dropdown-menu">
            <button><a href="Meat.php">Meat</a></button>
            <button><a href="chicken.php">chicken</a></button>
            <button><a href="seafood.php">seafood</a></button>
            <button><a href="drinks.php">Drinks</a></button>
          </div>
        </div>
        <div class="dropdown">
          <button class="button">
            Login/Signup
            <img src="NavBar/chevron.svg" />
          </button>
          <div class="dropdown-menu">
            <button><a href="Login.html">Login</a></button>
            <button><a href="info.php">SignUp</a></button>
          </div>
        </div>
        <div class="dropdown">
          <button class="button">
            Support
            <img src="NavBar/chevron.svg" />
          </button>
          <div class="dropdown-menu">
            <button><a href="Feedback.html">Send feedback</a></button>
          </div>
        </div>
      </div>
      <script>
      const toggleMenu = () => document.body.classList.toggle("open");
    </script>
    </nav>
    </div>
     </div> 
     </div> 
    </div>
  </div>
  <div class="row">
      <div class="col-">
        <div class="col-s-12 ">
          <div class="col-m-12">
            <div class="col-l-12">
    <div class="Text-offer">
     <p> Offers for today:</p>
     </div></div>
            </div></div>
            </div></div>
    <div class="image-container">
        <?php include("show-offer.php"); 
        ?>
</div>
<div class="body1"  style=" ">
  <div class="itemb1">
              <div class="Text-offer">
     <p> Meat</p>
     </div>
<?php include("phpiclude/MeatMeal.php");?>   
  </div>
  <div class="itemb1">
              <div class="Text-offer">
     <p> Chcken</p>
     </div>
<?php include("phpiclude/Chicken.php");?>
            </div>     
            <div class="itemb1">
              <div class="Text-offer">
     <p> SeaFood</p>
     </div>
<?php include("phpiclude/seafood.php");?>
            </div>
            <div class="itemb1">
              <div class="Text-offer">
     <p> drinks</p>
     </div>
<?php include("phpiclude/drinks.php");?>
            </div>
            <div class="footer">
      <div class="heading">
        <h2>ID<sup>12130259</sup></h2>
      </div>
      <div class="content">
        <div class="services">
          <h4>Services</h4>
          <p><a href="#">App development</a></p>
          <p><a href="#">Web development</a></p>
          <p><a href="#">DevOps</a></p>
          <p><a href="#">Web designing</a></p>
        </div>
        <div class="social-media">
          <h4>Social</h4>
          <p>
            <a href="#"
              ><i class="fab fa-linkedin"></i>Linkedin</a
            >
          </p>
          <p>
            <a href="#"
              ><i class="fab fa-twitter"></i> Twitter</a
            >
          </p>
          <p>
            <a href="#"
              ><i class="fab fa-github"></i> Github</a
            >
          </p>
          <p>
            <a href="#"
              ><i class="fab fa-facebook"></i> Facebook</a
            >
          </p>
          <p>
            <a href="#"
              ><i class="fab fa-instagram"></i> Instagram</a
            >
          </p>
        </div>
        <div class="links">
          <h4>Quick links</h4>
          <p><a href="#">Home</a></p>
          <p><a href="#">About</a></p>
          <p><a href="#">Blogs</a></p>
          <p><a href="#">Contact</a></p>
        </div>
        <div class="details">
          <h4 class="address">Address</h4>
          <p>
            Lorem ipsum dolor sit amet consectetur <br />
            adipisicing elit. Cupiditate, qui!
          </p>
          <h4 class="mobile">Mobile</h4>
          <p><a href="#">+961*****</a></p>
          <h4 class="mail">Email</h4>
          <p><a href="#">12130259@Students.liu.edu.lb</a></p>
        </div>
      </div>
      <footer>
        <hr />
        2023 Done By mohammadbaqerattwi
      </footer>
    </div>
            </div>
           <?php include("buble.php");?>
           <script>
    // Reload the page every 5 seconds using Ajax
    setInterval(function () {
        $.ajax({
            url: 'buble.php',
            type: 'GET',
            success: function (data) {
                // Replace the entire body with the updated content
                $('body').html(data);
            }
        });
    }, 5000);
</script>
</body></html>