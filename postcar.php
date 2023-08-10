<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    ?>
    <!DOCTYPE HTML>
    <html lang="en">

    <head>

        <title>Car Rental Portal | Post cars </title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <!--Custome Style -->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!--OWL Carousel slider-->
        <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
        <!--slick-slider -->
        <link href="assets/css/slick.css" rel="stylesheet">
        <!--bootstrap-slider -->
        <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
        <!--FontAwesome Font Style -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- SWITCHER -->
        <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"
            data-default-color="true" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
            href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
            href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
            href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
        <!-- Google-Font-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    </head>

    <body>
        
        <!-- /Switcher -->

        <!--Header-->
        <?php include('includes/header.php'); ?>
        <!--Page Header-->
        <section class="page-header profile_page">
            <div class="container">
                <div class="page-header_wrap">
                    <div class="page-heading">
                        <h1>Apply tennant</h1>
                    </div>
                    <ul class="coustom-breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Post cars</li>
                    </ul>
                </div>
            </div>
            <!-- Dark Overlay-->
            <div class="dark-overlay"></div>
        </section>
        <!-- /Page Header-->


        <section class="user_profile inner_pages">
            <div class="container">
                <div class="user_profile_info gray-bg padding_4x4_40">
                    <div class="upload_user_logo"> <img src="assets/images/tenant-logo.jpg" alt="image">
                    </div>
                    <?php 
                      $email = $_SESSION['login'];
                      $sql = "SELECT * FROM tblusers WHERE EmailId=:email ";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':email', $email, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      if ($query->rowCount() > 0) {
                          foreach ($results as $result) {

                          }
                      }
                      $id=$result->id;
                      ?>

                    <div class="dealer_info">
                        <h5>Post your own car</h5>
                        <p>A tenant is allowed to post his own car and monitor own bookings<br>
                       <a href="admin/post-avehical.php?from=tenant&id=<?php echo $id; ?>"> <button class="btn">Continue</button></a>



                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <?php include('includes/sidebar.php'); ?>
                        <div class="col-md-8 col-sm-8">
                       <a href="admin/new-bookings.php?from=tenant&id=<?php echo $id; ?>"> <button class="btn" style="background:skyblue">Bookings</button></a>
                       <a href="admin/post-avehical.php?from=tenant&id=<?php echo $id; ?>"> <button class="btn">Manage my-vehicles</button></a>



                           
                        </div>
                    </div>
                </div>
        </section>
        <?php
        if (isset($_POST['apply'])) {
            $userid = $result->id;
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $status = 0;

            $sql = "INSERT INTO tenantapplication (userid,email,phone,message,status) VALUES(?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array($userid, $email, $phone, $message, $status));
            if ($stmt) {
                echo "<script>alert('your application was sent sucessfully'); window.location='profile.php'</script>";
            } else {
                echo "<script>alert('oops! application failed');</script>";
            }
        }
        ?>
        <!--/my-vehicles-->

        <<!--Footer -->
            <?php include('includes/footer.php'); ?>
            <!-- /Footer-->

            <!--Back to top-->
            <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
            </div>

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

    </html>
<?php } ?>