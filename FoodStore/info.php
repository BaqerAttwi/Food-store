<html>
    <head> <link rel="stylesheet" type="text/css" href="StyleS.css">
    <script src="code.js" defer></script></head>
    <body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">SignUp</div>
      <div class="eula">SignUp to recive lastet offers and plates </div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
      <form method='post' action='Signup.php'>
<form id="signupForm" >
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phonenumber">Phone Number:</label>
    <input type="tel" id="phonenumber" name="phonenumber" required>

    <label for="password">Password:</label>
    <input  type="password" id="password" name="password" required>
    <button type='submit' name='delete' onclick="validateAndSubmit()">Submit</button>
</form>
</form>
      </div>
    </div>
  </div>
</div>
<script>
    function validateAndSubmit() {
        // Client-side validation (you can customize this part)
        var fullname = document.getElementById("fullname").value;
        var email = document.getElementById("email").value;
        var phonenumber = document.getElementById("phonenumber").value;
        var password = document.getElementById("password").value;

        if (!fullname || !email || !phonenumber || !password) {
            alert("Please fill in all fields.");
            return;
        }

        // Collect form data
        var formData = new FormData(document.getElementById("signupForm"));

        // Send data to the server using Ajax
        fetch("Signup.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the server response
            console.log(data);
            // You can redirect to another page or show a success message here
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
</script>
    </body></html>