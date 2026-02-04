<!DOCTYPE html> 
<head> 
    <meta char="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="register.css">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ecf0f1;">
    <a class="navbar-brand ms-3" style=font-family:arial href="#">UniParkX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto me-3">
        <a class="nav-item nav-link" href="index.html">Home</a>
         </div>
        </div>
    </nav>
</head>

<body>
  <section id="register" class="centered-item">
    <form name="register" action="register_process.php" method="POST" class="needs-validation" novalidate onsubmit="return validatePasswordMatch()">
      <h2>Registration</h2>

      <div style="text-align: left;">
        <input type="text" name="username" placeholder="Username" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please enter a username.</div>
      </div>

      <div style="text-align: left;">
        <input type="text" name="student_id" placeholder="Student ID" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please enter your student ID.</div>
      </div>

      <div style="text-align: left;">
        <input type="password" name="password" placeholder="Password" required id="password">
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please enter a password.</div>
      </div>

      <div style="text-align: left;">
        <input type="password" name="confirm_password" placeholder="Confirm Password" required id="confirm_password">
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please confirm your password.</div>
        <div id="match-error" style="color:red; text-align:left; font-size:12px; display:none;">Passwords do not match!</div>
      </div>

      <div style="text-align: left;">
        <input type="email" name="email" placeholder="Email Address" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please enter a valid email address.</div>
      </div>

      <div style="text-align: left;">
        <input type="text" name="vehicle_model" placeholder="Vehicle model" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please enter a vehicle model.</div>
      </div>

      <div style="text-align: left;">
        <input type="text" name="plate_number" placeholder="Plate Number" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">Please enter a plate number.</div>
      </div>

      <button type="submit">Register</button>

      <div style="text-align:center;">
        <p>Already have an account? <a href="login.php">Login here!</a></p>
      </div>
    </form>
  </section>

  <script>
    // Bootstrap validation
    (function () {
      'use strict';
      var forms = document.querySelectorAll('.needs-validation');
      Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();

    // Password match check
    function validatePasswordMatch() {
      const pass = document.getElementById('password').value;
      const confirm = document.getElementById('confirm_password').value;
      const errorDiv = document.getElementById('match-error');
      if (pass !== confirm) {
        errorDiv.style.display = "block";
        return false;
      } else {
        errorDiv.style.display = "none";
        return true;
      }
    }
  </script>
</body>


</html>