<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
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
                                <li class="breadcrumb-item text-white active" aria-current="page">Déposer une Annonce</li>


                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <div class="wrapper">
        <h2>Informations Services </h2>

        <form method="POST" action="">

            <h4>Type</h4>
            <div class="input-group">
                <div class="input-box">
                    <select class="option" name="type" required>
                        <option selected>Choisi le Type de Services</option>
                        <option>Sport-Entraîneur</option>
                        <option>Santé-Infirmier</option>
                        <option>Education-Cours/Formation</option>
                        <option>Animaux-Vétérinaire</option>
                        <option>Enfant-garderie</option>
                        <option>Bricolage-Menuiserie</option>
                        <option>Bricolage-Peinture</option>
                        <option>Bricolage-Plomberie</option>
                        <option>Bricolage-Soudure</option>
                        <option>Bricolage-Piscine</option>
                        <option>Entretien</option>
                        <option>Réparation de matérial</option>
                        <option>Textil</option>
                        <option>Jardinage</option>
                        <option>Mécanique</option>
                        <option>Sécurité</option>
                        <option>Autre</option>
                    </select>
                </div>
            </div>

            <h4>Titre</h4>
            <div class="input-box">
                <input type="text" placeholder="Titre" class="name" name="titre" required>
            </div>

            <h4>Expériences</h4>
            <input type="radio" name="db" required>
              <label>Débutant</label><br>
            <input type="radio" name="prof">
              <label>Professionnel</label><br>


            <h4>Ville</h4>
            <div class="input-group">
                <div class="input-box">
                    <select class="option" name="ville" required>
                        <option selected>Choisi une Ville</option>
                        <option>Rabat</option>
                        <option>Salé</option>
                        <option>Temara</option>
                        <option>Kenitra</option>
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

            <h4>Tel</h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="name" name="tel" required>

                </div>
            </div>

            <h4>Prix/heure</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix/heure" class="name" name="prix1" required>
            </div>

            <h4>Prix/jour</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix/jour" class="name" name="prix2" required>
            </div>

            <h4>Prix/semaine</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix/semaine" class="name" name="prix3" required>
            </div>

            <h4>Prix/jour</h4>
            <div class="input-box">
                <input type="text" placeholder="Prix/jour" class="name" name="prix4" required>
            </div>

            <h4>Description</h4>
            <div class="input-box">
                <textarea placeholder="Plus de caractéristique de service " class="name" name="des" rows="4" cols="50" required></textarea>
            </div>

            <h4>Email</h4>
            <div class="input-box">
                <input type="email" placeholder="Email" class="name" name="email" required>
                <i class="fa fa-envelope icon"></i>
            </div>

            <h4>Mot de Passe</h4>
            <div class="input-box">
                <input type="password" placeholder="Mot de Passe" class="name" name="mot" required>
                <i class="fas fa-lock icon"></i>
            </div>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>