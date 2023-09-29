<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rento - Outil Evénementiel</title>
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


    <link href="css/style3.css" rel="stylesheet">

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
                        <h1 class="display-3 text-white animated slideInDown">Décrire votre Bien</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Outil Evénementiel</li>


                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <div class="wrapper">
        <h2>Informations Outil Evénementiel </h2>
        <div class="">
            <h4 class="text-warning text-center">
                <?php
                if (isset($_GET['errur'])) {
                    echo $_GET['errur'];
                }
                ?>
            </h4>
        </div>

        <form method="POST" action="tannonce2.php" enctype="multipart/form-data">

            <h4>Type</h4>
            <div class="input-group">
                <div class="input-box">
                    <select class="option" name="type" required>
                        <option selected>Choisi le Type d'Evénements</option>
                        <option>Accessoires Femme</option>
                        <option>Accessoires Homme</option>
                        <option>Vêtements de Cérémonie Femme</option>
                        <option>Vêtements de Cérémonie Homme</option>
                        <option>Tente et Immoubilier pour événements</option>
                        <option>Animation</option>
                        <option>Autre</option>
                    </select>
                </div>
            </div>

            <h4>Titre</h4>
            <div class="input-box">
                <input type="text" placeholder="Titre" class="name" name="titre" id="monInput" oninput="convertirEnMajuscules()" required>
            </div>

            <h4>Etat</h4>
            <input type="radio" name="etat" value="neuf" required>
              <label>Neuf</label><br>
            <input type="radio" name="etat" value="Bon">
              <label>Bon</label><br>
            <input type="radio" name="etat" value="Moyen">
              <label>Moyen</label><br>

            <h4>Ville</h4>
            <div class="input-group">
                <div class="input-box">
                    <select class="option" name="ville" required>
                        <option selected>Choisi une Ville</option>
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

            <h4>Adresse</h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" placeholder="Saisi l'adresse" class="name" name="adresse" required>

                </div>
            </div>

            <h4>Prix/Dhs/Heure</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix" class="name" name="prix" required>
            </div>
            <h4>Prix/Dhs/Jour</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix" class="name" name="prix1" required>
            </div>
            <h4>Prix/Dhs/Semaine</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix" class="name" name="prix2">
            </div>
            <h4>Prix/Dhs/Mois</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix" class="name" name="prix3">
            </div>

            <h4>Description</h4>
            <div class="input-box">
                <textarea placeholder="Plus de caractéristique sur objetgs " class="name" name="des" rows="4" cols="50" required></textarea>
            </div>

            <h4>Images</h4>
            <div class="input-box">
                <input type="file" class="form-control" name="image1" accept="image/png, image/jpeg" required><br>
                <input type="file" class="form-control" name="image2" accept="image/png, image/jpeg"><br>
                <input type="file" class="form-control" name="image3" accept="image/png, image/jpeg"><br>
                <input type="file" class="form-control" name="image4" accept="image/png, image/jpeg"><br>
            </div>

            <?php
            if (isset($_SESSION['email']) && ($_SESSION['mot'])) {
            ?>
                <div class="input-box">
                    <input type="hidden" class="name" name="email" value="<?php echo $_SESSION['email'] ?>" disabled="disabled">

                </div>


            <?php
            } else {
            ?>
                <h4>Email</h4>
                <div class="input-box">
                    <input type="email" class="name" name="email" placeholder="votre email" required>
                    <i class="fa fa-envelope icon"></i>
                </div>

                <h4>Mot de Passe</h4>
                <div class="input-box">
                    <input type="password" class="name" name="mot" placeholder="votre mot de passe" required>
                    <i class="fas fa-lock icon"></i>
                </div>
            <?php
            }
            ?>
            <div class="input-box">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </div>


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
    <script>
        function convertirEnMajuscules() {
            var input = document.getElementById("monInput");
            input.value = input.value.toUpperCase();
        }
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>