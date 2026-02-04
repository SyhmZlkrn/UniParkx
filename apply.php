<!-- 
 <!DOCTYPE html> 
<head> 
    <meta char="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>

  <!-- Latest compiled and minified CSS 
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
  <section id="login" class="centered-item">
    <form name="apply_form" method="post" action="apply_process.php" class="needs-validation" novalidate>
      <h2>Vehicle Details</h2>

      <div style="text-align: left;">
        <input type="text" name="vehicle_model" placeholder="vehicle model" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:12px;">
          Please enter your vehicle model.
        </div>
      </div>

      <div style="text-align: left;">
        <input type="text" name="plate_number" placeholder="plate number" required>
        <div class="invalid-feedback" style="color:red; text-align:left; font-size:14px;">
          Please enter your plate number.
        </div>
      </div>

      <button type="submit">Apply</button>

    </form>

  </section>

  <script>
    // Bootstrap-style validation
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
  </script>
</body>

</html>

-->