<?php
require_once("connexion_server/connexion.php");
session_start();

if (isset($_SESSION['email'])) {
    $e = $_SESSION['email'];
    $req1 = $pdo->prepare("select * from utilisateur where email=:email");
    $req1->bindValue(':email', $e, PDO::PARAM_STR);
    $req1->execute();
    $tableau = $req1->fetch(PDO::FETCH_ASSOC);

    $req2 = $pdo->prepare('select * from immoubilier where email=:email');
    $req2->bindValue(':email', $e, PDO::PARAM_STR);
    $req2->execute();
    $tableau2 = $req2->fetchAll(PDO::FETCH_ASSOC);

    $req3 = $pdo->prepare('select * from materiaux where email=:email');
    $req3->bindValue(':email', $e, PDO::PARAM_STR);
    $req3->execute();
    $tableau3 = $req3->fetchAll(PDO::FETCH_ASSOC);

    $req4 = $pdo->prepare('select * from evenement where email=:email');
    $req4->bindValue(':email', $e, PDO::PARAM_STR);
    $req4->execute();
    $tableau4 = $req4->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rento - Dashbord</title>
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
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <img src="logo/rentologo.png" alt="Logo">
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Qui Somme Nous?</a>
                        <div class="dropdown-menu m-0">
                            <a href="concepte.php" class="dropdown-item">Concept de Rento</a>
                            <a href="mention.php" class="dropdown-item">Mention légale/FAQ</a>
                            <a href="contact.php" class="dropdown-item">Contact</a>




                        </div>
                    </div>

                    <a href="recherche.php" class="nav-item nav-link">Louez</a>


                    <div class="nav-item dropdown">

                        <?php
                        if (isset($_SESSION['type'])) {
                        } else {
                        ?>
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">M'inscrire</a>
                            <div class="dropdown-menu m-0">
                                <a href="inscription.php" class="dropdown-item">Particulier</a>
                                <a href="inscriptionpro.php" class="dropdown-item">Professionnel</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_SESSION['type'])) {
                        if ($_SESSION['type'] == "professionnel") {

                    ?>
                            <a href="" class="nav-item nav-link">Ma Boutique</a>
                        <?php
                        } else {
                        ?>
                            <a href="in1.php" class="nav-item nav-link active">Annonces</a>
                    <?php
                        }
                    }
                    ?>
                </div>
                <a href="deposer.php" class="btn btn-primary rounded-pill py-2 px-4">Déposer une Annonce</a>
                <div class="nav-item dropdown">
                    <?php
                    if (isset($_SESSION['email']) && $_SESSION['mot']) {

                    ?>
                        <a href="d.php" class="nav-item nav-link"><i class="bi bi-box-arrow-in-right"></i></a>

                    <?php
                    } else {
                    ?>
                        <a href="login.php" class="nav-item nav-link">Se Connecter</a>

                    <?php
                    }
                    ?>

                </div>

            </div>
        </nav>
        <br><br><br><br><br>


        <!-- Package Start 1-->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Bonjour, <?php echo strtolower($tableau["nom_prenom"]); ?> </h6>

                    <h1 class="mb-5">Vos Annonces :</h1>
                </div>

                <div class="row g-4 justify-content-center">
                    <h3>Immoubilier :</h3>
                    <?php
                    if (isset($tableau2)) {
                        foreach ($tableau2 as $data1) {
                    ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">


                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="<?php echo './img/' . $data1['image1'] . ''; ?>" alt="">
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data1['ville']; ?></small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data1['date_ann']; ?></small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Immoubilier</small>
                                    </div>
                                    <div class="text-center p-4">
                                        <h3 class="mb-0"><?php echo $data1['prix']; ?> MAD/jour</h3>
                                        <div class="mb-3">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p><?php echo $data1['titre']; ?></p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="recherchepart.php?id=<?php echo $data1['id']; ?>&id_cat=<?php echo $data1['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-eye"></i></a>
                                            <a href="modifier_annonce.php?id=<?php echo $data1['id']; ?>&id_cat=<?php echo $data1['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-pencil-square"></i></a>

                                        </div>
                                        <div class="d-flex justify-content-center m-2">
                                            <a href="supprimer.php?code1=<?php echo $data1['id'] ?>" class='btn btn-sm btn-primary px-3 border-end m-1' onclick="return confirm('Voulez vous supprimez?');">
                                                <i class="bi bi-trash"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo $tableau2;
                    } ?>
                </div>

                <br><br>
                <div class="row g-4 justify-content-center">
                    <h3>Materiaux</h3>
                    <?php
                    if (isset($tableau3)) {
                        foreach ($tableau3 as $data2) {
                    ?>

                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="<?php echo './img/' . $data2['image1'] . ''; ?>" alt="">
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data2['ville']; ?></small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data2['date_ann']; ?></small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Outillages</small>
                                    </div>
                                    <div class="text-center p-4">
                                        <h3 class="mb-0"><?php echo $data2['prix']; ?> MAD/jour</h3>
                                        <div class="mb-3">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p><?php echo $data2['titre']; ?></p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="recherchepart.php?id=<?php echo $data2['id']; ?>&id_cat=<?php echo $data2['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-eye"></i></a>
                                            <a href="modifier_annonce.php?id=<?php echo $data2['id']; ?>&id_cat=<?php echo $data2['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-pencil-square"></i></a>

                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="supprimer.php?code2=<?php echo $data2['id'] ?>" onclick="return confirm('Voulez vous supprimez?');" class="btn btn-sm btn-primary px-3 border-end m-1">
                                                <i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
                <BR<<BR>
                    <div class="row g-4 justify-content-center">
                        <h3>Evenement :</h3>
                        <?php
                        if (isset($tableau4)) {
                            foreach ($tableau4 as $data3) {
                        ?>


                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="package-item">
                                        <div class="overflow-hidden">
                                            <img class="img-fluid" src="<?php echo './img/' . $data3['image1'] . ''; ?>" alt="">
                                        </div>
                                        <div class="d-flex border-bottom">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $data3['ville']; ?></small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $data3['date_ann']; ?></small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Outil Evénementiel</small>
                                        </div>
                                        <div class="text-center p-4">
                                            <h3 class="mb-0"><?php echo $data3['prix']; ?> MAD/jour</h3>
                                            <div class="mb-3">
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                            </div>
                                            <p><?php echo $data3['titre']; ?></p>

                                            <div class="d-flex justify-content-center mb-2">
                                                <a href="recherchepart.php?id=<?php echo $data3['id']; ?>&id_cat=<?php echo $data3['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-eye"></i></a>
                                                <a href="modifier_annonce.php?id=<?php echo $data3['id']; ?>&id_cat=<?php echo $data3['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-pencil-square"></i></a>

                                            </div>
                                            <div class="d-flex justify-content-center mb-2">
                                                <a href="supprimer.php?code3=<?php echo $data3['id'] ?>" onclick="return confirm('Voulez vous supprimez?');" class="btn btn-sm btn-primary px-3 border-end m-1"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
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