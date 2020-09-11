$(document).ready(function () {
  var password = "";
  var username = "";
  var firstName = "";
  var lastName = "";
  var email = "";
  var confirmPassword = "";
  var lowerCaseLetters = /[a-z]/g;
  var upperCaseLetters = /[A-Z]/g;
  var numbers = /[0-9]/g;
  var lowerLimit = 8;
  var nonWordChar = /\W/g;
  var underscore = /_/g;
  var emailChar = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/; //^\S+@\S+[\.][0-9a-z]+$

  $("#password").focus(function () {
    $(".passwordCondition").show();
  });

  $("#password").keyup(function () {
    password = $("#password").val();
    if (confirmPassword === password && confirmPassword != "") {
      $(".confirmPasswordCondition").css("color", "green");
      $(".confirmPasswordCondition").text("Password Match!");
      $(".confirmPasswordCondition").show();
    } else {
      $(".confirmPasswordCondition").css("color", "red");
      $(".confirmPasswordCondition").text("Password does not match!");
      $(".confirmPasswordCondition").show();
    }
    if (
      password.match(lowerCaseLetters) &&
      password.match(upperCaseLetters) &&
      password.match(numbers) &&
      password.length >= lowerLimit
    ) {
      $(".passwordCondition").css("color", "green");
      $(".passwordCondition").text("Password is valid");
    } else {
      $(".passwordCondition").css("color", "red");
      $(".passwordCondition").text(
        "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
      );
      $(".passwordCondition").show();
    }
  });

  $("#password").blur(function () {
    password = $("#password").val();
    if (
      password.match(lowerCaseLetters) &&
      password.match(upperCaseLetters) &&
      password.match(numbers) &&
      password.length >= lowerLimit
    ) {
      $(".passwordCondition").css("color", "green");
      $(".passwordCondition").text("Password is valid");
    } else if (password === "") {
      $(".passwordCondition").hide();

      if (confirmPassword === "") {
        $(".confirmPasswordCondition").hide();
      }
    } else {
      $(".passwordCondition").css("color", "red");
      $(".passwordCondition").text("Invalid Password");
      $(".passwordCondition").show();
    }
  });

  $("#username").focus(function (e) {
    e.preventDefault();
    $(".usernameCondition").show();
  });

  $("#username").keyup(function (e) {
    e.preventDefault();
    username = $("#username").val();
    if (
      username.match(underscore) ||
      username.match(nonWordChar) ||
      username.length < 4
    ) {
      $(".usernameCondition").css("color", "red");
      $(".usernameCondition").text(
        "Must contain at least 4 characters of only letters and numbers"
      );
    } else {
      $(".usernameCondition").css("color", "green");
      $(".usernameCondition").text("Username is valid");
    }
    $(".usernameCondition").show();
  });

  $("#username").blur(function () {
    username = $("#username").val();
    if (username === "") {
      $(".usernameCondition").hide();
    } else if (
      username.match(underscore) ||
      username.match(nonWordChar) ||
      username.length < 4
    ) {
      $(".usernameCondition").css("color", "red");
      $(".usernameCondition").text("Invalid Username");
    } else {
      $(".usernameCondition").css("color", "green");
      $(".usernameCondition").text("Username is valid");
    }
  });

  $("#firstName").focus(function (e) {
    e.preventDefault();
    $(".firstNameCondition").show();
  });

  $("#firstName").keyup(function (e) {
    e.preventDefault();
    firstName = $("#firstName").val();
    if (
      firstName.match(underscore) ||
      firstName.match(nonWordChar) ||
      firstName.match(numbers) ||
      firstName.length < 1
    ) {
      $(".firstNameCondition").css("color", "red");
      $(".firstNameCondition").text("Must contain only letters");
    } else {
      $(".firstNameCondition").css("color", "green");
      $(".firstNameCondition").text("Valid");
    }
    $(".firstNameCondition").show();
  });

  $("#firstName").blur(function (e) {
    e.preventDefault();
    firstName = $("#firstName").val();
    if (firstName === "") {
      $(".firstNameCondition").hide();
    } else if (
      firstName.match(underscore) ||
      firstName.match(nonWordChar) ||
      firstName.match(numbers) ||
      firstName.length < 1
    ) {
      $(".firstNameCondition").css("color", "red");
      $(".firstNameCondition").text("Invalid");
    } else {
      $(".firstNameCondition").css("color", "green");
      $(".firstNameCondition").text("Valid");
    }
  });

  $("#lastName").focus(function (e) {
    e.preventDefault();
    $(".lastNameCondition").show();
  });

  $("#lastName").keyup(function (e) {
    e.preventDefault();
    lastName = $("#lastName").val();
    if (
      lastName.match(underscore) ||
      lastName.match(nonWordChar) ||
      lastName.match(numbers) ||
      lastName.length < 1
    ) {
      $(".lastNameCondition").css("color", "red");
      $(".lastNameCondition").text("Must contain only letters");
    } else {
      $(".lastNameCondition").css("color", "green");
      $(".lastNameCondition").text("Valid");
    }
    $(".lastNameCondition").show();
  });

  $("#lastName").blur(function (e) {
    e.preventDefault();
    lastName = $("#lastName").val();
    if (lastName === "") {
      $(".lastNameCondition").hide();
    } else if (
      lastName.match(underscore) ||
      lastName.match(nonWordChar) ||
      lastName.match(numbers) ||
      lastName.length < 1
    ) {
      $(".lastNameCondition").css("color", "red");
      $(".lastNameCondition").text("Invalid");
    } else {
      $(".lastNameCondition").css("color", "green");
      $(".lastNameCondition").text("Valid");
    }
  });

  $("#email").focus(function (e) {
    e.preventDefault();
    $(".emailCondition").show();
  });

  $("#email").keyup(function (e) {
    email = $("#email").val();
    if (email.match(emailChar)) {
      $(".emailCondition").css("color", "green");
      $(".emailCondition").text("Email is valid!");
    } else {
      $(".emailCondition").css("color", "red");
      $(".emailCondition").text("Please provide a valid email address.");
    }
    $(".emailCondition").show();
  });

  $("#email").blur(function (e) {
    email = $("#email").val();
    if (email === "") {
      $(".emailCondition").hide();
    } else if (email.match(emailChar)) {
      $(".emailCondition").css("color", "green");
      $(".emailCondition").text("Email is valid!");
    } else {
      $(".emailCondition").css("color", "red");
      $(".emailCondition").text("Please provide a valid email address.");
    }
  });

  $("#confirmPassword").focus(function (e) {
    e.preventDefault();
    if (confirmPassword === password && confirmPassword !== "") {
      $(".confirmPasswordCondition").css("color", "green");
      $(".confirmPasswordCondition").text("Password Match!");
    } else {
      $(".confirmPasswordCondition").css("color", "red");
      $(".confirmPasswordCondition").text("Password does not match!");
    }
    $(".confirmPasswordCondition").show();
  });

  $("#confirmPassword").keyup(function (e) {
    confirmPassword = $("#confirmPassword").val();
    if (confirmPassword === password && password != "") {
      $(".confirmPasswordCondition").css("color", "green");
      $(".confirmPasswordCondition").text("Password Match!");
    } else {
      $(".confirmPasswordCondition").css("color", "red");
      $(".confirmPasswordCondition").text("Password does not match!");
    }
    $(".confirmPasswordCondition").show();
  });

  $("#confirmPassword").blur(function (e) {
    e.preventDefault();
    confirmPassword = $("#confirmPassword").val();
    if (confirmPassword === password && confirmPassword !== "") {
      $(".confirmPasswordCondition").css("color", "green");
      $(".confirmPasswordCondition").text("Password Match!");
    } else if (confirmPassword === "") {
      $(".confirmPasswordCondition").hide();
    } else {
      $(".confirmPasswordCondition").css("color", "red");
      $(".confirmPasswordCondition").text("Password does not match!");
    }
  });
});
