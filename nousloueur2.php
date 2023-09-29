<?php
session_start();
include("connexion_server/connexion.php");

if (isset($_GET['d'])) {
    $_SESSION['d'] = $_GET['d'];
    $d = $_SESSION['d'];

    $req2 = $pdo->prepare('SELECt * FROM utilisateur where domaine=:domaine');
    $req2->bindValue(':domaine', $d);
    $req2->execute();
    $resultat = $req2->fetchAll(PDO::FETCH_ASSOC);
} elseif (!isset($_POST['rech'])) {
    $d = $_SESSION['d'];
    $req2 = $pdo->prepare('SELECt * FROM utilisateur where domaine=:domaine');
    $req2->bindValue(':domaine', $d);
    $req2->execute();
    $resultat = $req2->fetchAll(PDO::FETCH_ASSOC);
} else {
    $mot = $_POST['rech'];
    $d = $_SESSION['d'];
    //$mot='%'.$mot.'%';
    $req1 = $pdo->prepare('SELECt * FROM utilisateur where domaine=:domaine and nom_boutique=:boutique');
    $req1->bindValue(':domaine', $d);
    $req1->bindValue(':boutique', $mot);
    $req1->execute();
    $resultat = $req1->fetchAll(PDO::FETCH_ASSOC);
    if ($req1 == false) {
        header("location:nousloueur2.php?errur=Boutique Introuvable");
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rento-Loueurs</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="loueurcss/css/bootstrap.min.css" rel="stylesheet">

    <link href="loueurcss/css/bootstrap-icons.css" rel="stylesheet">

    <link href="loueurcss/css/owl.carousel.min.css" rel="stylesheet">

    <link href="loueurcss/css/owl.theme.default.min.css" rel="stylesheet">

    <link href="loueurcss/css/tooplate-gotto-job.css" rel="stylesheet">

    <!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
</head>

<body id="top">


    <main>


        <div>
            <?php
            if (isset($_GET['errur'])) {
                echo $_GET['errur'];
            }
            ?>
        </div>




        <section class="job-section job-featured-section section-padding" id="job-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 text-center mx-auto mb-4">
                        <h2>Boutiques de Rento</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="nousloueurs.php">Boutique</a></li>

                            </ol>
                        </nav>
                        <p><strong>Consulter</strong> Les boutiques de Rento est apprécié une belle expérience.</p>
                    </div>

                    <form class="custom-form newsletter-form" action="nousloueur2.php" method="POST">
                        <h6 class="site-footer-title">Lien rapide</h6>
                        <b><a href="nousloueur2.php">Actualiser</a></b>
                        <div class="input-group">

                            <input type="text" name="rech" class="form-control" placeholder="Nom de la Boutique" value="<?php if (isset($_POST['rech'])) {
                                                                                                                            echo $_POST['rech'];
                                                                                                                        } ?>" required>

                            <button type="submit" class="form-control">
                                GO
                            </button>

                        </div>
                    </form>
                </div>


                <br><br><br>
                <div class="col-lg-12 col-12">
                    <?php
                    foreach ($resultat as $data) {
                    ?>
                        <div class="job-thumb d-flex">
                            <div class="job-image-wrap bg-white shadow-lg">
                                <img src="<?php echo './img/' . $data['logo'] . ''; ?>" class="job-image img-fluid" alt="">
                            </div>

                            <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                <div class="mb-3">
                                    <h4 class="job-title mb-lg-0">
                                        <a href="" class="job-title-link"><?php echo $data['nom_boutique']; ?></a>
                                    </h4>

                                    <div class="d-flex flex-wrap align-items-center">
                                        <p class="job-location mb-0">
                                            Ville:<?php echo $data['ville']; ?>
                                        </p>

                                        <p class="job-date mb-0">
                                            <i class="custom-icon bi-clock me-1"></i>
                                            Tél:<?php echo $data['tel']; ?>
                                        </p>

                                        <p class="job-price mb-0">

                                            Créer:<?php echo $data['date_ins']; ?>
                                        </p>


                                    </div>
                                </div>

                                <div class="job-section-btn-wrap">
                                    <a href="" class="custom-btn btn">Visiter</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>








                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-5">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">Prev</span>
                                </a>
                            </li>

                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">5</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            </div>
        </section>




    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>