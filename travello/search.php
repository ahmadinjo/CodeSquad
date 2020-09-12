<?php session_start();?>
<?php $pageTitle = "search";?>
<?php include 'includes/db.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Destinations</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Travello template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/destinations.css">
    <link rel="stylesheet" type="text/css" href="styles/destinations_responsive.css">
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
		<div class="background_image" style="background-image:url(images/destinations.jpg)"></div>
	</div>

	<!-- Search -->

    	<?php

        $cityerr = $departureerr = $arrivalerr = $budgeterr = "";
        $city = $departure = $arrival = $budget = $departuredate = $arrivaldate = $arrivaldatestring = $departuredatestring = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {

          if (empty($_GET["city"]) || $_GET["city"] == "") {
            $city = "";
          } else {
            $city = test_input($_GET["city"]);
            if (!preg_match("/^[a-zA-Z- ]*$/",$city)) {
              $city = "";
            }
          }

          if (empty($_GET["departuredate"]) || $_GET["departuredate"] == "" || !preg_match("#(?>^(([0][1-9])|([1][0-2]))[/](([0-2][0-9])|([3][0-1]))[/](2020|2021))#",$_GET["departuredate"])) {
            $departure = "";
          } else {
            $departure = test_input($_GET["departuredate"]);
            $departuredate = date_create_from_format("m/d/Y",$departure);
            $departuredatestring = date_format($departuredate,"d/m/Y");
          }

          if (empty($_GET["arrivaldate"]) || $_GET["arrivaldate"] == "" || !preg_match("#(?>^(([0][1-9])|([1][0-2]))[/](([0-2][0-9])|([3][0-1]))[/](2020|2021))#",$_GET["arrivaldate"])) {
            $arrival = "";
          } else {
            $arrival = test_input($_GET["arrivaldate"]);
            $arrivaldate = date_create_from_format("m/d/Y",$arrival);
            $arrivaldatestring = date_format($arrivaldate,"d/m/Y");
          }
          
          if (empty($_GET["budget"]) || $_GET["budget"] === "") {
            $budget = 0;
          } else {
            $budget = test_input($_GET["budget"]);
            if (!preg_match("/^[0-9]*$/",$budget) || !is_finite((int)$budget)) {
              $budget = 0;
            } else {
              $budget = (int)$budget;
              if ($budget < 0) {
                $budget = 0;
              }
            }
          }
          
          if ($city == "" || $budget == 0) {
            if ($city == "" && $budget > 0) {
              $sql = "SELECT * FROM destination WHERE budget <= '{$budget}'";
            } elseif ($city != "" && $budget == 0) {
              $sql = "SELECT * FROM destination WHERE city = '{$city}'";
            } else {
              $sql = "SELECT * FROM destination";
            }
          } else {
            $sql = "SELECT * FROM destination WHERE budget <= '{$budget}' AND city = '{$city}'";
          }
          $result = $conn->query($sql);
        }

        

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
      ?>

      <div class="home_search">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="home_search_container">
                <div class="home_search_title">Search for your trip<?php /* echo date_format($arrivaldate,"d/m/Y") */?></div>
                <div class="home_search_content">
                  <form
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                    method="GET"
                    class="home_search_form"
                    id="home_search_form"
                  >
                    <div
                      class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start"
                    >
                      <div class="form-group search_input_1"><span class="required">* <?php echo $cityerr?></span><input
                        type="text"
                        class="search_input"
                        placeholder="City"
                        name="city"
                        value="<?php echo $city?>"
                        required="required"
                      /></div>
                      <div class="form-group search_input_2 booking-icon"><span class="required">* <?php echo $departureerr?></span><input
                        type="text"
                        class="search_input datepicker date-input"
                        placeholder="Departure"
                        value="<?php echo $departure?>"
                        name="departure"
                        required="required"
                      /></div>
                      <div class="form-group search_input_3 booking-icon"><span class="required">* <?php echo $arrivalerr?></span><input
                        type="text"
                        class="search_input datepicker date-input"
                        placeholder="Arrival"
                        value="<?php echo $arrival?>"
                        name="arrival"
                        required="required"
                      /></div>
                      <div class="form-group search_input_4 currency-icon"><span class="required">* <?php echo $budgeterr?></span><input
                        type="text"
                        class="search_input budget_input"
                        placeholder="Budget"
                        value="<?php echo $budget?>"
                        name="budget"
                        required="required"
                      /></div>
                      <button class="home_search_button" name="search" type="submit">search</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <!-- Destinations -->
	<div class="destinations" id="destinations">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_subtitle">simply amazing places</div>
					<div class="section_title"><h2>Popular Destinations</h2></div>
				</div>
			</div>
			<div class="row destination_sorting_row">
				<div class="col">
					<div class="destination_sorting d-flex flex-row align-items-start justify-content-start">
						<div class="sorting">
							<ul class="item_sorting">
								<li>
									<span class="sorting_text">Sort By</span>
									<i class="fa fa-chevron-down" aria-hidden="true"></i>
									<ul>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Show All</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Name</span></li>
									</ul>
								</li>
								<li>
									<span class="sorting_text">Categories</span>
									<i class="fa fa-chevron-down" aria-hidden="true"></i>
									<ul>
										<li class="num_sorting_btn"><span>Category</span></li>
										<li class="num_sorting_btn"><span>Category</span></li>
										<li class="num_sorting_btn"><span>Category</span></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="sort_box ml-auto"><i class="fa fa-th" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
			<div class="row destinations_row">
				<div class="col">
					<div class="destinations_container item_grid">
            <?php
              if (isset($result) && $result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
                  $destinationcity = $rows["City"];
                  $destinationdescription = $rows["Description"];
                  $destinationimage = $rows["Image"];
                  $destinationbudget = $rows["Budget"];
                  $destinationoffer = $rows["Offer"];
                  if ($destinationoffer == "Special") {
                    $offer = '<div class="spec_offer text-center"><a href="#">Special Offer</a></div>';
                  } else {
                    $offer = '';
                  }
            ?>
						<div class="destination item">
							<div class="destination_image">
								<img src="images/<?php echo $destinationimage;?>" alt="">
                <?php echo $offer;?>
              </div>
							<div class="destination_content">
								<div class="destination_title"><a href="#"><?php echo $destinationcity;?></a></div>
								<div class="destination_subtitle"><p><?php echo $destinationdescription;?></p></div>
								<div class="destination_price">From $<?php echo $destinationbudget;?></div>
								<div class="destination_list">
									<ul>
										<li>5 Stars Hotel</li>
										<li>All Inclusive</li>
										<li>Flight tickets included</li>
										<li>Guided visits</li>
									</ul>
								</div>
							</div>
						</div>
            <?php
                }
              } elseif (isset($result) && $result->num_rows == 0) {
                echo '<div class="row destination item" style="width: 100%;">
                        <div class="col text-center">
                        <div class="section_title"><h2>No Destination Available!</h2></div>
                        <div class="section_subtitle">Review your selection and try again</div>
                        </div>
                      </div>';
              }
            ?>
					</div>
				</div>
			</div>
			<!-- <div class="row load_more_row">
				<div class="col">
					<div class="button load_more_button"><a href="#">load more</a></div>
				</div>
			</div> -->
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/destinations.js"></script>
<?php include 'includes/jscripts.php'?>
</body>
</html>