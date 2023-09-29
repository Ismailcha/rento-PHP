<?php
session_start();
?>

<head>
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
                    <a href="liste_besoin.php" class="nav-item nav-link">Item demander</a>
            <?php
                }
            }
            ?>
        </div><?php
                if (isset($_SESSION['email']) && $_SESSION['mot']) {

                ?>
            <a href="deposer.php" class="btn btn-primary rounded-pill py-2 px-4">Déposer une Annonce</a>
            <div class="nav-item dropdown">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person text-muted"></i></a>
                    <div class="dropdown-menu m-0">
                        <a href="in1.php" class="nav-item nav-link text-muted">Annonces</a>
                        <a href="d.php" class="nav-item nav-link m-2"><i class="bi bi-box-arrow-right text-danger"></i></a>
                    </div>


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