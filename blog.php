<?php
require("connexion_server/connexion.php");
if (isset($_GET['numPage'])) {
  $currentPage = $_GET['numPage'];
} else {
  $currentPage = 1;
}
$req = $pdo->prepare("select count(id) as nbr_article from article");
$req->execute();
$result = $req->fetch();
$nbEnr = (int)$result['nbr_article']; // number of items converted in int 
$pages = ceil($nbEnr / 2); // 4 pages
$premier = ($currentPage * 2) - 2; // cacul l'index the first time of page

$req = $pdo->prepare("select * from article LIMIT :premier, 3");
$req->bindValue(":premier", $premier, PDO::PARAM_INT);
$req->execute();
$tableau = $req->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Rento - Blog</title>
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


  <link rel="stylesheet" href="css/style1.css">

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
            <h1 class="display-3 text-white animated slideInDown">Magazine</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Magazine</li>


              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar & Hero End -->

  <!-- partial:index.partial.html -->

  <div class="container">
    <?php foreach ($tableau as $data) {
    ?>
      <div class="card">
        <div class="card__header">
          <div class="card__image" width="600">

            <?php echo '<img src="./img/' . $data['photo'] . '">'; ?>
          </div>
        </div>

        <div class="card__body">
          <span class="tag tag-blue"><?php echo $data['categorie']; ?></span>

          <a href="blog2.php?id=<?php echo $data['id']; ?>" class="stretched-link">
            <h4><?php echo $data['titre']; ?></h4>
          </a>
          <p><?php echo $data['des1']; ?></p>
        </div>
        <div class="card__footer">
          <div class="user">
            <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
            <div class="user__info">
              <h5><?php echo $data['acteur']; ?></h5>
              <small><?php echo $data['date_article']; ?></small>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

    for ($i = 1; $i <= $pages; $i++) {
    ?>
      <div class="">
        <a href="blog.php?numPage=<?php echo $i; ?>"><?php echo $i; ?></a>
      </div>
    <?php
    }
    ?>

  </div>

  <!-- partial -->

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