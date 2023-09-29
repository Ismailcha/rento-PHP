<?php
require("connexion_server/connexion.php");
$searchText = isset($_GET['searchText']) ? $_GET['searchText'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$results = [];

if (empty($searchText)) {
    if ($category === '1') {
        $query = "SELECT * FROM immoubilier";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results['immoubilier'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($category === '2') {
        $query = "SELECT * FROM materiaux";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results['materiaux'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($category === '3') {
        $query = "SELECT * FROM evenement";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results['evenement'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($category === 'all') {
        $queryImmobilier = "SELECT * FROM immoubilier";
        $stmtImmobilier = $pdo->prepare($queryImmobilier);
        $stmtImmobilier->execute();
        $results['immoubilier'] = $stmtImmobilier->fetchAll(PDO::FETCH_ASSOC);

        $queryMateriaux = "SELECT * FROM materiaux";
        $stmtMateriaux = $pdo->prepare($queryMateriaux);
        $stmtMateriaux->execute();
        $results['materiaux'] = $stmtMateriaux->fetchAll(PDO::FETCH_ASSOC);

        $queryEvenement = "SELECT * FROM evenement";
        $stmtEvenement = $pdo->prepare($queryEvenement);
        $stmtEvenement->execute();
        $results['evenement'] = $stmtEvenement->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    if ($category === 'all' || $category === '1') {
        $queryImmobilier = "SELECT * FROM immoubilier WHERE titre LIKE :searchText OR description LIKE :searchText";
        $stmtImmobilier = $pdo->prepare($queryImmobilier);
        $stmtImmobilier->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
        $stmtImmobilier->execute();
        $immobilierResults = $stmtImmobilier->fetchAll(PDO::FETCH_ASSOC);
        $results['immoubilier'] = $immobilierResults;
    }

    if ($category === 'all' || $category === '2') {
        $queryMateriaux = "SELECT * FROM materiaux WHERE titre LIKE :searchText OR description LIKE :searchText";
        $stmtMateriaux = $pdo->prepare($queryMateriaux);
        $stmtMateriaux->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
        $stmtMateriaux->execute();
        $materiauxResults = $stmtMateriaux->fetchAll(PDO::FETCH_ASSOC);
        $results['materiaux'] = $materiauxResults;
    }

    if ($category === 'all' || $category === '3') {
        $queryEvenement = "SELECT * FROM evenement WHERE titre LIKE :searchText OR description LIKE :searchText";
        $stmtEvenement = $pdo->prepare($queryEvenement);
        $stmtEvenement->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
        $stmtEvenement->execute();
        $evenementResults = $stmtEvenement->fetchAll(PDO::FETCH_ASSOC);
        $results['evenement'] = $evenementResults;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de recherche</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include necessary fonts and icons if used -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .image-container {
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio, adjust as needed */
            background-size: contain;
            /* Ensure the entire image fits within the container */
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body>

    <?php include('entete.php'); ?>
    <!-- Add your top bar if needed -->
    <div class="container-fluid position-relative p-0">
        <!-- Add your header section if needed -->
        <div class="tab-content container-fluid py-5 mb-5">
            <!-- Replicate the structure of your first page -->
            <!-- Include your search form -->
            <h1 class="m-4 text-center">Page de recherche</h1>
            <form action="" method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="searchText" class="form-label">Object :</label>
                        <input type="text" id="searchText" name="searchText" class="form-control" value="<?php echo $searchText; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Categorie:</label>
                        <select id="category" name="category" class="form-select">
                            <option value="all">All</option>
                            <option value="1">Immobilier</option>
                            <option value="2">Matériaux</option>
                            <option value="3">Événement</option>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-center mt-5">
                        <button type="submit" class="btn btn-primary">Chercher</button>
                    </div>
                </div>
            </form>


            <?php foreach ($results as $tableName => $tableResults) : ?>
                <?php if (!empty($tableResults)) : ?>
                    <h2><?php echo ucfirst($tableName); ?> </h2>
                    <div class="row">
                        <?php foreach ($tableResults as $result) : ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <div class="image-container" style="background-image: url('img/<?php echo $result['image1']; ?>');"></div>
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            <?php echo $result['ville']; ?>
                                        </small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-calendar-alt text-primary me-2"></i>
                                            <?php echo $result['date_ann']; ?>
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-user text-primary me-2"></i>
                                            <?php echo ucfirst($tableName); ?>
                                        </small>
                                    </div>
                                    <div class="text-center p-4">
                                        <h3 class="mb-0">MAD/jour <?php echo $result['prix']; ?></h3>
                                        <p><?php echo $result['titre']; ?></p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="recherchepart.php?id=<?php echo $result['id']; ?>&id_cat=<?php echo $result['id_cat']; ?>" class="btn btn-sm btn-primary px-3 border-end">Voir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- Include your footer section if needed -->
    </div>
    <!-- Include Bootstrap JS at the end of the body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include your custom JavaScript if needed -->
    <script src="js/main.js"></script>
</body>

</html>