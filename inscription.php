<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rento - Inscription/Particulier</title>
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

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Inscription</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">M'inscrire</li>
                                <li class="breadcrumb-item"><a href="inscription.php">Particulier</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">

            <div class="booking p-5">

                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h5 class="text-white mb-4">Inscrivez-vous Gratuitement!!<br>et rejoignez la communauté des loueurs Rento</h5>
                    </div>
                    <div class="col-md-6">
                        <hr>
                        <?php
                        if (isset($_GET['errur'])) {
                        ?>
                            <div class="err">
                                <?php
                                echo $_GET['errur'];
                                ?>
                            </div>
                            <hr>
                        <?php
                        }
                        ?>
                        <form action="ajouter.php" method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" name="nom" placeholder="Nom Complet" required>
                                        <label>Nom Complet</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control bg-transparent" name="tel" placeholder="Tél" pattern="[0-9]{10}" required>
                                        <label>Téléphone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" name="ville" placeholder="Ville" required>
                                        <label>Ville</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" name="email" placeholder="Email" required>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-transparent" name="mot" placeholder="Mot de Passe" required>
                                        <label>Mot de Passe</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-transparent" name="cmot" placeholder="Confirmation Mots de Passe" required>
                                        <label>Confirmation Mots de Passe</label>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <input type="checkbox" name="check" required>
                                    <label for="vehicle1"> j'accepte les <a href="mention.php">Mentions Légale</a> du Rento</label>

                                </div>


                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Créez un Compte</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- Process Start -->

    <!-- Process Start -->


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