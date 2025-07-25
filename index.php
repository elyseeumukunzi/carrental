<?php
session_start();
include ('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Start Switcher -->
<!-- /Switcher -->  
        
<!--Header-->
<?php include ('includes/header.php'); ?>
<!-- /Header --> 

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>&nbsp;</h1>
            <p>&nbsp; </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 


<!-- Resent Cat-->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span>CarForYou</span></h2>
      <p>Welcome to Wheels of Mercy Rentals – your dedicated partner for car hire in Rwanda. Born from a passion for exploring this beautiful country, our mission is to provide hassle-free, dependable, and safe transportation solutions for every traveler and resident. We understand Rwanda's roads and its unique charm, ensuring you get the right vehicle for your needs.</p>
    </div>
    <div class="row"> 
      
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Car</a></li>
        </ul>
      </div>
      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">

<?php
$sql = 'SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9';
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) {
    ?>  

<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> Model</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
<span class="price"><?php echo htmlentities($result->PricePerDay); ?> RWF/Day</span> 
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->VehiclesOverview, 0, 70); ?></p>
</div>
</div>
</div>
<?php }
} ?>
       
      </div>
    </div>
  </div>
</section>

<section class="section-padding gray-bg">
  <div class="container">
  <!-- listing available rent options -->
  <div class="section-header text-center">
      <h2>Find Your Perfect Ride<span>Diverse Rentals for Every Journey</span></h2>
      <p>Discover our most popular choices, perfect for any Rwandan itinerary </p>
    </div>

    <div class="row"> 
      
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          
        </ul>
      </div>
      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">

        <div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box">  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>

</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities('Tourist and Adventures'); ?></a></h6>
<span class="price"><?php echo htmlentities($result->PricePerDay); ?> RWF/Day</span> 
</div>
<div class="inventory_info_m">
<p>Our robust fleet of SUVs is perfectly equipped for navigating the scenic routes to Volcanoes National Park for gorilla trekking, the rolling hills of Nyungwe Forest, or the vast plains of Akagera. Experience comfort, reliability, and the freedom to explore at your own pace.</p>
</div>
</div>
</div>


<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box">  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>

</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities('Weddings & Parties'); ?></a></h6>

</div>
<div class="inventory_info_m">
<p>Add a touch of elegance and sophistication to your special day. Our premium and luxury vehicles are available for weddings, anniversaries, graduations, and other significant events. Arrive in style and comfort, ensuring your momentous occasion is celebrated with the grand entrance it deserves.</p>
</div>
</div>
</div>

<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box">  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>

</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities('Families & Group Travelers'); ?></a></h6>
<span class="price"><?php echo htmlentities($result->PricePerDay); ?> RWF/Day</span> 
</div>
<div class="inventory_info_m">
<p>Our robust fleet of SUVs is perfectly equipped for navigating the scenic routes to Volcanoes National Park for gorilla trekking, the rolling hills of Nyungwe Forest, or the vast plains of Akagera. Experience comfort, reliability, and the freedom to explore at your own pace.</p>
</div>
</div>
</div>











</div>

</section>
<!-- /Resent Cat --> 

<!-- Fun Facts-->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>5+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>100+</h2>
            <p>New Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>100+</h2>
            <p>Used Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>100+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts--> 


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php
$tid = 1;
$sql = 'SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid limit 4';
$query = $dbh->prepare($sql);
$query->bindParam(':tid', $tid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) {
    ?>


        <div class="testimonial-m">
 
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName); ?></h5>
            <p><?php echo htmlentities($result->Testimonial); ?></p>
          </div>
        </div>
        </div>
        <?php }
} ?>
        
       
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


<!--Footer -->
<?php include ('includes/footer.php'); ?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include ('includes/login.php'); ?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include ('includes/registration.php'); ?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include ('includes/forgotpassword.php'); ?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>