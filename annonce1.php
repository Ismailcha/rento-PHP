<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rento- Immobilier</title>
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
                                <li class="breadcrumb-item text-white active" aria-current="page">Immoubilier</li>



                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <div class="wrapper">
        <h2>Informations Immobilier </h2>

        <div class="">
            <h4 class="text-warning text-center">
                <?php
                if (isset($_GET['errur'])) {
                    echo $_GET['errur'];
                }
                ?>
            </h4>
        </div>

        <form method="POST" action="tannonce1.php" enctype="multipart/form-data">

            <h4>Type</h4>
            <div class="input-group">
                <div class="input-box">
                    <select class="option" name="type" required>
                        <option selected>Choisi le Type d'Immoubiliers</option>
                        <option>Appartement</option>
                        <option>Maison</option>
                        <option>Villa</option>
                        <option>Terrain</option>
                        <option>Ferme</option>
                        <option>Duplex</option>
                        <option>Riad</option>
                        <option>Bureau</option>
                        <option>Garage</option>
                        <option>Plateau</option>
                        <option>Studio</option>
                        <option>Autre</option>
                    </select>
                </div>
            </div>

            <h4>Titre</h4>
            <div class="input-box">
                <input type="text" placeholder="Titre" class="name" name="titre" id="monInput" oninput="convertirEnMajuscules()" required>
            </div>

            <h4>Surface/m²</h4>
            <div class="input-box">
                <input type="number" placeholder="Surface" class="name" name="surface" required>
            </div>

            <h4>Etage</h4>
            <div class="input-group">
                <div class="input-box">
                    <select class="option" name="etage" required>
                        <option selected>Choisi l'Etage d'Immoubiliers</option>
                        <option>RDC</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>Autre</option>
                    </select>
                </div>
            </div>

            <h4>NB Chambres</h4>
            <div class="input-box">
                <input type="number" placeholder="Nombre de chambre" class="name" name="nbchambre">
            </div>

            <h4>NB Salons</h4>
            <div class="input-box">
                <input type="number" placeholder="Nombre de salon" class="name" name="nbsalon">
            </div>

            <h4>NB de WC</h4>
            <div class="input-box">
                <input type="number" placeholder="Nombre de WC" class="name" name="nbwc">
            </div>

            <h4>NB Salle de Bains</h4>
            <div class="input-box">
                <input type="number" placeholder="Nombre de salle de bains" class="name" name="nbbain">
            </div>

            <h4>NB Total de Pièces</h4>
            <div class="input-box">
                <input type="number" placeholder="Nombre total de piéces" class="name" name="nbtotal">
            </div>

            <h4>Cuisine</h4>
            <input type="radio" name="cuisine" value="equipe" required>
              <label>Equipé</label><br>
            <input type="radio" name="cuisine" value="non equipe">
              <label>Non Equipé</label><br>
            <input type="radio" name="cuisine" value="autre">
              <label>Autre</label><br>

            <h4>Meublé</h4>
            <input type="radio" name="meuble" value="oui" required>
              <label>OUI</label><br>
            <input type="radio" name="meuble" value="non">
              <label>Non</label><br>
            <input type="radio" name="meuble" value="autre">
              <label>Autre</label><br>

            <h4>Ville</h4>
            <div class="input-group">
                <div class="input-box">

                    <select class="option" name="ville" required>
                        <option selected>Choisi la ville</option>
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

            <h4>Prix/Dhs/jour</h4>
            <div class="input-box">
                <input type="number" placeholder="Prix" class="name" name="prix" required>
            </div>

            <h4>Description</h4>
            <div class="input-box">
                <textarea placeholder="Plus de caractéristique sur objetgs " class="name" name="des" rows="4" cols="50" required></textarea>
            </div>

            <h4>Images</h4>
            <div class="input-box">
                <input type="file" class="form-control" name="image1" accept="image/png, image/jpeg, image/jpg, image/gif" required><br>
                <input type="file" class="form-control" name="image2" accept="image/png, image/jpeg, image/jpg, image/gif"><br>
                <input type="file" class="form-control" name="image3" accept="image/png, image/jpeg, image/jpg, image/gif"><br>
                <input type="file" class="form-control" name="image4" accept="image/png, image/jpeg, image/jpg, image/gif"><br>
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



            <br>
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