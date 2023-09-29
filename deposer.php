<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Choisir annonce categorie</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="logo/rentologo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">




</head>

<body>
    <!-- Spinner Start -->
    <?php
    require_once("spinner.php");
    ?>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php
    require_once("tobar.php");
    ?>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <?php
        require_once("entete.php");
        ?>
    </div>
    <br><br><br><br>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-5">Bien choisir sa catégorie</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="annonce1.php">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-hotel text-primary mb-4" style="font-size:150px"></i>
                                <h5>Immoubiliers</h5>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="annonce3.php">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-suitcase text-primary mb-4" style="font-size:150px"></i>

                                <h5>Outillages</h5>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a href="annonce2.php">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fas fa-calendar-alt text-primary mb-4" style="font-size:150px"></i>

                                <h5>Outils événementiels</h5>


                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Footer Start -->
    <?php
    require_once("pied.php")
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>