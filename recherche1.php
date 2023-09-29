<?php
include("connexion_server/connexion.php");

// Trim and sanitize input
$cat = isset($_GET['cat']) ? trim($_GET['cat']) : "";
$ville = isset($_GET['ville']) ? trim($_GET['ville']) : "";

// Initialization
$a = "";
$b = "";

if ($cat == "Tout les Catégories") {
  $cat = "";
}
if ($ville == "Tout le Maroc") {
  $ville = "";
}

// Build the conditions
$conditions = [];
$params = [];

if (!empty($cat)) {
  $conditions[] = "id_cat = :cat";
  $params['cat'] = $cat;
}
if (!empty($ville)) {
  $conditions[] = "ville = :ville";
  $params['ville'] = $ville;
}

// Construct the SQL query
$sql = "
  SELECT 
    id,
    titre,
    prix,
    image1,
    ville,
    date_ann,
    id_cat,
    'immoubilier' AS table_name
  FROM immoubilier
  UNION
  SELECT 
    id,
    titre,
    prix,
    image1,
    ville,
    date_ann,
    id_cat,
    'materiaux' AS table_name
  FROM materiaux
  UNION
  SELECT 
    id,
    titre,
    prix,
    image1,
    ville,
    date_ann,
    id_cat,
    'evenement' AS table_name
  FROM evenement
";

// Build conditions for filtering
if (!empty($conditions)) {
  $sql .= " WHERE " . implode(" AND ", $conditions);
}

// Execute the query to count the total records
$countQuery = $pdo->prepare("SELECT COUNT(*) AS total FROM ($sql) AS filtered_results");
$countQuery->execute($params);
$total_records = $countQuery->fetch(PDO::FETCH_ASSOC)['total'];

// Set the number of records per page
$records_per_page = 9;

// Calculate the number of pages
$number_of_pages = ceil($total_records / $records_per_page);

// Get the current page number
$page_number = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Get the offset for the current page
$offset = ($page_number - 1) * $records_per_page;

// Update the SQL query to include LIMIT and OFFSET
$sqlWithLimit = "$sql LIMIT :offset, :records_per_page";

// Execute the query with LIMIT and OFFSET
$req = $pdo->prepare($sqlWithLimit);
$req->bindParam(':offset', $offset, PDO::PARAM_INT);
$req->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);

// Bind additional parameters for filtering
foreach ($params as $param_name => $param_value) {
  $req->bindParam(':' . $param_name, $param_value);
}

$req->execute();
$resultat_page = $req->fetchAll(PDO::FETCH_ASSOC);
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
  <div class="container-fluid position-relative p-0">
    <?php
    require_once("entete.php");
    ?>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <div class="container">
      <div class="row">
        <?php foreach ($resultat_page as $data) : ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="package-item">
              <div class="overflow-hidden">
                <img class="img-fluid" src="<?php echo './img/' . $data['image1'] . ''; ?>" alt="">
              </div>
              <div class="d-flex border-bottom">
                <small class="flex-fill text-center border-end py-2">
                  <i class="fa fa-map-marker-alt text-primary me-2"></i>
                  <?php echo $data['ville']; ?>
                </small>
                <small class="flex-fill text-center border-end py-2">
                  <i class="fa fa-calendar-alt text-primary me-2"></i>
                  <?php echo $data['date_ann']; ?>
                </small>
                <small class="flex-fill text-center py-2">
                  <i class="fa fa-user text-primary me-2"></i>
                  <?php echo $data['table_name']; ?>
                </small>
              </div>
              <div class="text-center p-4">
                <h3 class="mb-0">MAD/jour <?php echo $data['prix']; ?></h3>
                <p><?php echo $data['titre']; ?></p>
                <div class="d-flex justify-content-center mb-2">
                  <a href="recherchepart.php?id=<?php echo $data['id']; ?>&id_cat=<?php echo $data['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end">Voir</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Pagination links -->
    <div class="pagination" style="justify-content: center;">
      <?php for ($i = 1; $i <= $number_of_pages; $i++) : ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $page_number) ?> class="page-link">
          <?php echo $i; ?>
        </a>
      <?php endfor; ?>
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