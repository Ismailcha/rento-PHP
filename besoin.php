<?php

require("connexion_server/connexion.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categorie = $_POST['categorie'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $urgent = $_POST['urgent'];
    $date_article = date('Y-m-d'); // Current date
    $photoPath = ''; // Initialize the photo path

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        $uploadedType = $_FILES['photo']['type'];

        if (in_array($uploadedType, $allowedTypes)) {
            $tempPath = $_FILES['photo']['tmp_name'];
            $photoName = $_FILES['photo']['name'];

            // Construct the path to save the photo
            $photoPath = 'img/' . $photoName;

            // Move the uploaded photo to the desired location
            move_uploaded_file($tempPath, $photoPath);
        } else {
            $errorMessage = "JPG ou PNG s'il vous plait.";
        }
    }

    // Prepare and execute the database insert query
    $query = "INSERT INTO besoin (categorie, titre, description, email, tel, date_article, photo, urgent) 
              VALUES (:categorie, :titre, :description, :email, :tel, :date_article, :photo, :urgent)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':categorie', $categorie, PDO::PARAM_INT);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':date_article', $date_article, PDO::PARAM_STR);
    $stmt->bindParam(':photo', $photoPath, PDO::PARAM_STR);
    $stmt->bindParam(':urgent', $urgent, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Successful submission
        $successMessage = "Votre demande a été soumise avec succès.";
    } else {
        // Error in submission
        $errorMessage = "Une erreur s'est produite lors de la soumission de votre demande.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Soumettre une demande</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
    <div class="pb-5">
        <?php
        include('entete.php')
        ?>
    </div>

    <div class="container col-md-8 pt-5">
        <h2 class="text-center">Soumettre une demande d'object</h2>
        <h5><a href="liste_besoin.php">Liste des items besoin</a></h5>
        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select name="categorie" class="form-select" required>
                    <!-- Populate options based on your categories in the database -->
                    <option value="1">Immobilier</option>
                    <option value="2">Material/Outillage</option>
                    <option value="3">Evènementiel</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <input type="hidden" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Telephone</label>
                <input type="tel" name="tel" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="urgent" class="form-label">Urgent?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="urgent" value="oui" required>
                    <label class="form-check-label">Oui</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="urgent" value="non" required>
                    <label class="form-check-label">Non</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>