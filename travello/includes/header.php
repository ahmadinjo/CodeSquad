<?php
  $home = $about = $services = $news = $contact = "";
  $headerbuttoninfo = "Login|SignUp";
  $headerbutton = "<a class='login-btn btn btn-outline-primary' href='login.php'>$headerbuttoninfo</a>";
  if (isset($_SESSION["firstname"])) {
    $headerbuttoninfo = "Welcome ". $_SESSION["firstname"];
    $headerbutton = "<div class='login-btn'><a class='btn btn-outline-primary' href='login.php'>$headerbuttoninfo</a><ul class='drop-menu'><li class='drop-item'><a href='logout.php'>Logout</a></li></ul></div>";
  }

  switch ($pageTitle) {
    case 'index':
      $home = 'active';
      break;
    case 'about':
      $about = 'active';
      break;
    case 'services':
      $services = 'active';
      break;
    case 'news':
      $news = 'active';
      break;
    case 'contact':
      $contact = 'active';
      break;
    case 'login':
      $headerbutton = "";
    case 'register':
      $headerbutton = "";
    default:
      $home = $about = $services = $news = $contact = "";
      break;
  }
  echo "<header class='header'>
        <div class='container'>
          <div class='row'>
            <div class='col'>
              <div
                class='header_content d-flex flex-row align-items-center justify-content-start'
              >
                <div
                  class='header_content_inner d-flex flex-row align-items-end justify-content-start'
                >
                  <div class='logo'><a href='index.html'>Travello</a></div>
                  <nav class='main_nav'>
                    <ul
                      class='d-flex flex-row align-items-start justify-content-start'
                    >
                      <li class='$home'><a href='index.php'>Home</a></li>
                      <li class='$about'><a href='about.php'>About us</a></li>
                      <li class='$services'><a href='#'>Services</a></li>
                      <li class='$news'><a href='news.php'>News</a></li>
                      <li class='$contact'><a href='contact.php'>Contact</a></li>
                    </ul>
                  </nav>
                  $headerbutton
                  <div class='header_phone ml-auto'>
                    Call us: 00-56 445 678 33
                  </div>

                  <!-- Hamburger -->

                  <div class='hamburger ml-auto'>
                    <i class='fa fa-bars' aria-hidden='true'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class='header_social d-flex flex-row align-items-center justify-content-start'
        >
          <ul class='d-flex flex-row align-items-start justify-content-start'>
            <li>
              <a href='#'><i class='fa fa-pinterest' aria-hidden='true'></i></a>
            </li>
            <li>
              <a href='#'><i class='fa fa-facebook' aria-hidden='true'></i></a>
            </li>
            <li>
              <a href='#'><i class='fa fa-twitter' aria-hidden='true'></i></a>
            </li>
            <li>
              <a href='#'><i class='fa fa-dribbble' aria-hidden='true'></i></a>
            </li>
            <li>
              <a href='#'><i class='fa fa-behance' aria-hidden='true'></i></a>
            </li>
            <li>
              <a href='#'><i class='fa fa-linkedin' aria-hidden='true'></i></a>
            </li>
          </ul>
        </div>
      </header>";
?>