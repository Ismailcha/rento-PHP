<?php
require("connexion_server/connexion.php");
session_start();
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Use prepared statement to prevent SQL injection
    $query = "%" . $query . "%"; // Add wildcard characters for partial matching

    $searchQuery = "SELECT * FROM besoin WHERE titre LIKE :query OR description LIKE :query";
    $stmt = $pdo->prepare($searchQuery);
    $stmt->bindParam(':query', $query, PDO::PARAM_STR);
    $stmt->execute();
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate HTML for displaying search results in a table
    if ($stmt->rowCount() > 0) {
        foreach ($searchResults as $result) {
            echo '<tr>';
            echo '<td>';
            if ($result['categorie'] === 1) {
                echo 'Immobilier';
            } elseif ($result['categorie'] === 2) {
                echo 'Matériel';
            } else {
                echo 'Évènementiel';
            }
            echo '</td>';

            echo '<td>' . $result['titre'] . '</td>';
            echo '<td>' . $result['description'] . '</td>';
            echo '<td>' . $result['email'] . '</td>';
            echo '<td>' . $result['tel'] . '</td>';
            echo '<td>' . $result['date_article'] . '</td>';
            echo '<td>' . $result['urgent'] . '</td>';
            echo '<td>';
            if (isset($result['photo']) && !empty($result['photo'])) {
                echo '<img src="' . $result['photo'] . '" class="img-thumbnail" style="max-width: 100px;">';
            }
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="8">Pas de resultat</td></tr>';
    }
}
// Retrieve all items
$query = "SELECT * FROM besoin";
$stmt = $pdo->prepare($query);
$stmt->execute();
$allBesoins = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve connected user's email
$connectedUserEmail = $_SESSION['email']; // Replace 'email' with the actual session key for user email

// Retrieve items associated with the connected user's email
$query = "SELECT * FROM besoin WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $connectedUserEmail, PDO::PARAM_STR);
$stmt->execute();
$besoins = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Liste des demandes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Add this line -->
    <link rel="icon" type="image/x-icon" href="logo/rentologo.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
                            <a href="liste_besoin.php" class="nav-item nav-link active">Item demander</a>
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
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person"></i></a>
                            <div class="dropdown-menu m-0">
                                <a href="in1.php" class="nav-item nav-link">Annonces</a>
                                <a href="d.php" class="nav-item nav-link m-2"><i class="bi bi-box-arrow-right"></i></a>
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
        <br><br><br><br><br>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Liste des demandes</h2>
            <h5><a href="besoin.php">besoin de quelque chose ?</a></h5>
            <div class='m-5'>
                <form action="search.php" method="POST">
                    <input type="text" id="searchInput" name="query" class="form-control" placeholder="Recherche...">
                </form>

            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Date de l'article</th>
                            <th>Urgent</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody id='searchResults'>
                        <?php
                        foreach ($allBesoins as $besoin) {
                            echo '<tr>';
                            echo '<td>';
                            if ($besoin['categorie'] === 1) {
                                echo 'Immobilier';
                            } elseif ($besoin['categorie'] === 2) {
                                echo 'Matériel';
                            } else {
                                echo 'Évènementiel';
                            }
                            echo '</td>';

                            echo '<td>' . $besoin['titre'] . '</td>';
                            echo '<td>' . $besoin['description'] . '</td>';
                            echo '<td>' . $besoin['email'] . '</td>';
                            echo '<td>' . $besoin['tel'] . '</td>';
                            echo '<td>' . $besoin['date_article'] . '</td>';
                            echo '<td>' . $besoin['urgent'] . '</td>';
                            echo '<td>';
                            if (isset($besoin['photo']) && !empty($besoin['photo'])) {
                                echo '<img src="' . $besoin['photo'] . '" class="img-thumbnail" style="max-width: 100px;">';
                            }
                            echo '</td>';
                            if ($besoin['email'] === $connectedUserEmail) {
                                echo '<td>';
                                echo '<a href="delete_besoin.php?id=' . $besoin['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Etes vous sur de supprimer cette demande ?\')">Delete</a>';
                                echo '</td>';
                            } else {
                                echo '<td></td>'; // Display an empty cell if not allowed to delete
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Include Bootstrap JS at the end of the body -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').keyup(function() {
            var query = $(this).val();
            if (query !== '') {
                $.ajax({
                    url: 'searchbesoin.php', // Point to the search.php page
                    method: 'POST',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#searchResults').html(data);
                    }
                });
            } else {
                $('#searchResults').html('');
            }
        });
    });
</script>