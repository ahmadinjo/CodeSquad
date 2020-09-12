<?php ob_start();?>
<?php session_start();?>
<?php $pageTitle = "register";?>
<?php ob_start();?>
<?php include 'includes/db.php';?>
<?php

  if (isset($_SESSION["firstname"])) {
    header("Location: index.php");
  }

  // define variables and set to empty values
  $firstNameErr = $emailErr = $lastNameErr = $usernameErr = $passwordErr = $confirmPasswordErr = "";

  $firstName = $email = $lastName = $username = $password = $confirmPassword = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {

    if (empty($_POST["firstName"])) {
      $firstNameErr = "First Name is required";
    } else {
      $firstName = test_input($_POST["firstName"]);
      if (!preg_match("/^[a-zA-Z]*$/",$firstName)) {
        $firstNameErr = "Only letters are allowed";
      }
    }

    if (empty($_POST["lastName"])) {
      $lastNameErr = "Last Name is required";
    } else {
      $lastName = test_input($_POST["lastName"]);
      if (!preg_match("/^[a-zA-Z]*$/",$lastName)) {
        $lastNameErr = "Only letters are allowed";
      }
    }

    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } else {
      $username = test_input($_POST["username"]);
      /* if (!preg_match("/^(([a-zA-Z]+)([a-zA-Z0-9])*$){4,}/",$username)) {
        $usernameErr = "Invalid username";
      } */
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = htmlspecialchars($_POST["password"]);
      /* if (!preg_match("/(([a-z]+[A-Z]+[0-9]+)*){8,}/",$password)) {
        $passwordErr = "Invlaid password";
      } */
    }

    if (empty($_POST["confirmPassword"])) {
      $confirmPasswordErr = "Password is required";
    } else {
      $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);
    }

    $sql = "INSERT INTO `test_customer_info` (`FirstName`, `LastName`, `Username`, `Password`, `Email`) VALUES ('$firstName', '$lastName', '$username', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
      header("Location: login.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  $conn->close();
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $conn = null;
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
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

      <div class="register">
        <div class="container">
          <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8 offset-2">
              <div class="form-title">Register</div>
              <div class="login-form-container">
                <form
                  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                  method="POST"
                  id="loginForm"
                  class="login-form needs-validation"
                  novalidate
                >
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName"
                        >First Name <span class="required">* <?php echo $firstNameErr;?></span></label
                      >
                      <input
                        type="text"
                        class="form-control contact_input contact_input_name inpt"
                        id="firstName"
                        name="firstName"
                        value="<?php echo $firstName;?>"
                        placeholder="First Name"
                        required
                      />
                      <div class="input_border"></div>
                      <div class="firstNameCondition">
                        Must contain only letters.
                      </div>
                      <!-- <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">
                        Please provide a valid input.
                      </div> -->
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName"
                        >Last Name <span class="required">* <?php echo $lastNameErr;?></span></label
                      >
                      <input
                        type="text"
                        class="form-control contact_input contact_input_name inpt"
                        id="lastName"
                        name="lastName"
                        value="<?php echo $lastName;?>"
                        placeholder="Last Name"
                        required
                      />
                      <div class="input_border"></div>
                      <div class="lastNameCondition">
                        Must contain only letters.
                      </div>
                      <!-- <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">
                        Please provide a valid input.
                      </div> -->
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="username"
                        >Username <span class="required">* <?php echo $usernameErr;?></span></label
                      >
                      <input
                        type="text"
                        class="form-control contact_input contact_input_name inpt"
                        id="username"
                        name="username"
                        value="<?php echo $username;?>"
                        placeholder="Username"
                        required
                      />
                      <div class="input_border"></div>
                      <div class="usernameCondition">
                        Must contain at least 4 characters of only letters and
                        numbers.
                      </div>
                      <!-- <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">
                        Username has to be numbers & lower case letters more
                        than 5 characters.
                      </div> -->
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="email"
                        >Email Address <span class="required">* <?php echo $emailErr;?></span></label
                      >
                      <input
                        type="email"
                        class="form-control contact_input contact_input_name inpt"
                        id="email"
                        name="email"
                        value="<?php echo $email;?>"
                        placeholder="Valid Email Address"
                        required
                      />
                      <div class="input_border"></div>
                      <div class="emailCondition">
                        Please provide a valid email address.
                      </div>
                      <!-- <div class="valid-feedback">Valid!</div>
                      <div class="invalid-feedback">
                        Please provide a valid email address.
                      </div> -->
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="password"
                        >Password <span class="required">* <?php echo $passwordErr;?></span></label
                      >
                      <input
                        type="password"
                        class="form-control contact_input contact_input_name inpt"
                        id="password"
                        name="password"
                        value=""
                        placeholder="Password"
                        required
                      />
                      <div class="input_border"></div>
                      <div class="passwordCondition">
                        Must contain at least one number and one uppercase and
                        lowercase letter, and at least 8 or more characters.
                      </div>
                      <!-- <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">
                        Password must be more than 5 characters.
                      </div> -->
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="confirmPassword"
                        >Confirm Password <span class="required">* <?php echo $confirmPasswordErr;?></span></label
                      >
                      <input
                        type="password"
                        class="form-control contact_input contact_input_name inpt"
                        id="confirmPassword"
                        name="confirmPassword"
                        value=""
                        placeholder="Confirm Password"
                        required
                      />
                      <div class="input_border"></div>
                      <div class="confirmPasswordCondition">
                        Password does not match!
                      </div>
                      <!-- <div class="valid-feedback">Match!</div>
                      <div class="invalid-feedback">
                        Please provide a match for password.
                      </div> -->
                    </div>
                  </div>
                  <!-- <div style="margin-bottom: 18px"><input type="text" class="contact_input contact_input_name inpt" placeholder="Username" required="required"><div class="input_border"></div></div>
                            <div style="margin-bottom: 18px"><input type="password" class="contact_input contact_input_name inpt" placeholder="Password" required="required"><div class="input_border"></div></div> -->
                  <button
                    id="registerSubmit"
                    class="register-form-btn btn btn-btn-secondary"
                    type="submit"
                    name="register"
                  >
                    Register
                  </button>
                </form>
                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-link reg">
                      Already has an account?
                      <a href="login.php">Login here</a>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div style="color: #ff0000">* - Required Field</div>
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
