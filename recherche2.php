<?php
include("connexion_server/connexion.php");
if (isset($_GET['var'])) {
    $var = $_GET['var'];
    if ($var == 'i') {
        $req = $pdo->prepare("select * from immoubilier ");
        $req->execute();
        $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($var == 'o') {
        $req = $pdo->prepare("select * from materiaux ");
        $req->execute();
        $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $req = $pdo->prepare("select * from evenement ");
        $req->execute();
        $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rento - Accueil</title>
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

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
    <div class="container-fluid position-relative p-0">
        <?php
        require_once("entete.php");
        ?>
        <br><br><br><br><br>
        <br><br><br><br><br>


        <!-- Package Start 1-->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">À Louer</h6>
                    <h1 class="mb-5">sur Rento</h1>
                </div>

                <div class="row g-4 justify-content-center">
                    <?php
                    foreach ($tableau as $data) {
                    ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="<?php echo './img/' . $data['image1'] . ''; ?>" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data['ville']; ?></small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data['date_ann']; ?></small>

                                </div>
                                <div class="text-center p-4">
                                    <h3 class="mb-0"><?php echo $data['prix']; ?> MAD/jour</h3>
                                    <div class="mb-3">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                    <p><?php echo $data['titre']; ?></p>
                                    <div class="d-flex justify-content-center mb-2">

                                        <a href="recherchepart.php?id=<?php echo $data['id']; ?>&cat=<?php echo $data['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end">Voir</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>

                <br><br>


            </div>
        </div>
        <!-- Package End -->

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