<?php ob_start();?>
<?php session_start()?>
<?php $pageTitle = "login";?>
<?php include 'includes/db.php';?>
<?php


  if (isset($_SESSION["firstname"])) {
    header("Location: index.php");
  }
  // define variables and set to empty values
  $usernameErr = $passwordErr = "";
  $username = $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } else {
      $username = test_input($_POST["username"]);
      /* if (!preg_match("/(^([a-zA-Z]+)([a-zA-Z0-9])*$){4,}/",$username)) {
        $usernameErr = "Invalid username";
      } */
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = htmlspecialchars($_POST["password"]);
      /* if (!preg_match("/(([a-z]+[A-Z]+[0-9]+)*){8,}/",$password)) {
        $passwordErr = "Invlaid password";
      } */
    }

    $sql = "SELECT * FROM test_customer_info";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($rows = $result->fetch_assoc()) {
        $dbuserusername = $rows["Username"];
        $dbuserpassword = $rows["Password"];
        $dbuserid = $rows["ID"];
        $dbuseremail = $rows["Email"];
        $dbuserfirstname = $rows["FirstName"];
        $dbuserlastname = $rows["LastName"];
        if (($dbuserusername == $username) && ($dbuserpassword == $password)) {
          $_SESSION["id"] = $dbuserid;
          $_SESSION["username"] = $dbuserusername;
          $_SESSION["password"] = $dbuserpassword;
          $_SESSION["email"] = $dbuseremail;
          $_SESSION["firstname"] = $dbuserfirstname;
          $_SESSION["lastname"] = $dbuserlastname;

          header("Location: index.php");
        }
      } echo "Invalid Username or Password";
    }

  }

  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LogIn</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Travello template project" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      type="text/css"
      href="styles/bootstrap4/bootstrap.min.css"
    />
    <link
      href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="plugins/OwlCarousel2-2.2.1/owl.carousel.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="plugins/OwlCarousel2-2.2.1/animate.css"
    />
    <link rel="stylesheet" type="text/css" href="styles/contact.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="styles/contact_responsive.css"
    />
    <?php include 'includes/styleslink.php'?>
  </head>
  <body>
    <div class="super_container">
      <!-- Header -->

      <?php include 'includes/header.php';?>

      <!-- Menu -->

      <?php include 'includes/menu.php';?>

      <!-- Home -->

      <div class="home">
        <div
          class="background_image"
          style="background-image: url(images/contact.jpg)"
        ></div>
      </div>

      <!-- Contact -->

      <div class="login">
        <div class="container">
          <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 offset-3">
              <div class="form-title">Log In</div>
              <div class="login-form-container">
                <form
                  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                  method="POST"
                  id="loginForm"
                  class="login-form needs-validation"
                  novalidate
                >
                  <div style="margin-bottom: 18px">
                    <span class="required">* <?php echo $usernameErr;?></span>
                    <input
                      type="text"
                      class="form-control contact_input contact_input_name inpt" name="username"
                      placeholder="Username" value="<?php echo $username;?>"
                      required
                    />
                    <div class="input_border"></div>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">
                      Please provide a valid input.
                    </div>
                  </div>
                  <div style="margin-bottom: 18px">
                    <span class="required">* <?php echo $usernameErr;?></span>
                    <input
                      type="password"
                      class="form-control contact_input contact_input_name inpt" value="" name="password" 
                      placeholder="Password"
                      required
                    />
                    <div class="input_border"></div>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">
                      Please provide a valid input.
                    </div>
                  </div>
                  <button
                    id="login_submit"
                    class="login-form-btn btn btn-btn-secondary"
                    type="submit"
                    name="login"
                  >
                    Log In
                  </button>
                </form>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-link">
                      <a href="register.php">Create an account</a>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-link">
                      <a href="#">Forgot Password?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->

      <?php include 'includes/footer.php';?>

    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="js/contact.js"></script>
    <?php include 'includes/jscripts.php'?>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        "use strict";
        window.addEventListener(
          "load",
          function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (
              form
            ) {
              form.addEventListener(
                "submit",
                function (event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add("was-validated");
                },
                false
              );
            });
          },
          false
        );
      })();
    </script>
  </body>
</html>
