<?php
include("connexion_server/connexion.php");

// remplir les catégories:
$req1 = $pdo->prepare('select * from categorie');
$req1->execute();
$resultat1 = $req1->fetchAll(PDO::FETCH_ASSOC);

// remplir le bien immobilier:
$req2 = $pdo->prepare('select* from immoubilier ORDER BY id DESC LIMIT 3');
$req2->execute();
$resultat2 = $req2->fetchAll(PDO::FETCH_ASSOC);

// remplir les outils:
$req3 = $pdo->prepare('select* from materiaux ORDER BY id DESC LIMIT 3');
$req3->execute();
$resultat3 = $req3->fetchAll(PDO::FETCH_ASSOC);

// remplire les outils événementiels:
$req4 = $pdo->prepare('select* from evenement ORDER BY id DESC LIMIT 3');
$req4->execute();
$resultat4 = $req4->fetchAll(PDO::FETCH_ASSOC);


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


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <?php
        require_once("entete.php");
        ?>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Avec "Rento" Tout à Louer</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">il y a forcément le bien qui correspond votre recherche</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">

                            <form action="recherche1.php" method="get">


                                <div class="col-md-10">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3 mb-md-0">
                                                <div>
                                                    <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 fas fa-search" name="cat">

                                                        <?php
                                                        echo '<option selected>' . "Tout les Catégories" . '</option>';

                                                        foreach ($resultat1 as $data) {
                                                            echo '<option value=' . $data['id'] . '>' . $data['designation'] . '</option>';
                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 mb-md-0">
                                                <div>
                                                    <select class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5 fas fa-search" name="ville">
                                                        <option selected>Tout le Maroc</option>;
                                                        <option>Rabat</option>
                                                        <option>Salé</option>
                                                        <option>Témara</option>
                                                        <option>Kenitra</option>
                                                        <option>Casablanca</option>
                                                        <option>Tanger</option>
                                                        <option>Fes</option>
                                                        <option>Mekens</option>
                                                        <option>Marakech</option>
                                                        <option>Ifran</option>
                                                        <option>Aoune</option>
                                                        <option>Autre</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>






                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary rounded-pill py-3 px-4 srch-btn top-0 end-0 ml-2 ">Aller </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height:595px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/Rento.png" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Qui Sommes-nous?</h6>
                    <h1 class="mb-4">Bienvenu Chez &nbsp;<span class="text-primary">Rento</span></h1>
                    <p class="mb-4">Rento, est la première plateforme de location au Maroc entre particuliers ou professionnels.</p>
                    <p class="mb-4">Notre mission est d’offrir à chacun de nos utilisateurs, une expérience simple et efficace afin de satisfaire leurs besoins à court-terme en toute sérénité.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Louer près de chez vous</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Louer au meilleur prix</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Les propriétaires gagnent de &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l’argent </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Les loueurs économisent de &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l’argent</p>
                        </div>

                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="concepte.php">Lire Plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">3 Pourquoi utiliser Rento?</h6>
                <h1 class="mb-5">Une accessibilité inclusive</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-globe fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Réduction de la surconsommation</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Des frais amoindris pour des besoins temporaires</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="bi bi-cash fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Flexibilité</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Gagner de l’argent</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-globe fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Communauté et Partage</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Réduction du gaspillage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->


    <!-- Destination Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                <h1 class="mb-5">Meilleur site de location entre particuliers ou professionnels au Maroc</h1>
            </div>

        </div>
    </div>
    <!-- Destination Start -->


    <!-- Package Start 1-->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">À Louer</h6>
                <h1 class="mb-5">Les derniers articles sur notre site</h1>
            </div>

            <div class="row g-4 justify-content-center">
                <?php
                foreach ($resultat2 as $data2) {
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo './img/' . $data2['image1'] . ''; ?>" alt="">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data2['ville']; ?></small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data2['date_ann']; ?></small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Immoubilier</small>
                            </div>
                            <div class="text-center p-4">
                                <p class="mb-0"><?php echo $data2['prix']; ?>MAD/Mois</p>
                                <h3><?php echo $data2['titre']; ?></h3>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="recherchepart.php?id=<?php echo $data2['id']; ?>&id_cat=<?php echo $data2['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end">Voir</a>

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
    <!-- Package Start 2-->
    <div class="container-xxl py-5">
        <div class="container">


            <div class="row g-4 justify-content-center">
                <?php
                foreach ($resultat3 as $data3) {
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo './img/' . $data3['image1'] . ''; ?>" alt="">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data3['ville']; ?></small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data3['date_ann']; ?></small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Outillages</small>
                            </div>
                            <div class="text-center p-4">
                                <p class="mb-0"><?php echo $data3['prix']; ?> MAD/Heure</p>
                                <h3><?php echo $data3['titre']; ?></h3>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="recherchepart.php?id=<?php echo $data3['id']; ?>&id_cat=<?php echo $data3['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end">Voir</a>

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
    <!-- Package Start 3-->
    <div class="container-xxl py-5">
        <div class="container">


            <div class="row g-4 justify-content-center">
                <?php
                foreach ($resultat4 as $data4) {
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo './img/' . $data4['image1'] . ''; ?>" alt="">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data4['ville']; ?></small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data4['date_ann']; ?></small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Outil Evénementiel</small>
                            </div>
                            <div class="text-center p-4">
                                <p class="mb-0"><?php echo $data4['prix']; ?> MAD/Heure</p>
                                <h3><?php echo $data4['titre']; ?></h3>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="recherchepart.php?id=<?php echo $data4['id']; ?>&id_cat=<?php echo $data4['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end">Voir</a>

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