<?php
include("connexion_server/connexion.php");



// le nombre d'immoubilier:
$d = "Immoubiliers";
$req2 = $pdo->prepare('SELECt * FROM utilisateur where domaine=:domaine');
$req2->bindValue(':domaine', $d);
$req2->execute();

$NB = $req2->rowCount();
// le nombre d'immoubilier:
$d1 = "outillages";
$req3 = $pdo->prepare('SELECt * FROM utilisateur where domaine=:domaine');
$req3->bindValue(':domaine', $d1);
$req3->execute();

$NB3 = $req3->rowCount();
// le nombre d'immoubilier:
$d2 = "Outils événementiels";
$req4 = $pdo->prepare('SELECt * FROM utilisateur where domaine=:domaine');
$req4->bindValue(':domaine', $d2);
$req4->execute();

$NB4 = $req4->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Rento - loueur</title>
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
  <link href="css/ss.css" rel="stylesheet">

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
  </div>
  <br><br><br><br><br>
  <div class="ag-format-container">
    <div class="ag-courses_box">
      <div class="ag-courses_item">
        <a href="nousloueur2.php?d=Immoubiliers" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Immoubiliers
          </div>

          <div class="ag-courses-item_date-box">
            Nombre de Boutiques:
            <span class="ag-courses-item_date">
              <?php
              echo "$NB";
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="nousloueur2.php?d=outillages" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Outillages
          </div>

          <div class="ag-courses-item_date-box">
            Nombre de Boutiques:
            <span class="ag-courses-item_date">
              <?php
              echo "$NB3";
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="nousloueur2.php?d=Outils événementiels" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Evènementiels
          </div>

          <div class="ag-courses-item_date-box">
            Nombre de Boutiques:
            <span class="ag-courses-item_date">
              <?php
              echo "$NB4";
              ?>
            </span>
          </div>
        </a>
      </div>
    </div>
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