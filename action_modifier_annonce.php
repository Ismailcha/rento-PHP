<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection available
    require("connexion_server/connexion.php");

    // Assuming you have a session started
    session_start();

    // Retrieve form data
    $id = $_GET['id'];
    $id_cat = $_GET['id_cat'];

    // Update query based on id and id_cat
    $updateQuery = "";

    if ($id_cat == 1) {
        $updateQuery = "UPDATE immoubilier SET ";
        $updateQuery .= "type = :type, titre = :titre, surface = :surface, etage = :etage, nbchambre = :nbchambre, nbsalon = :nbsalon, nbwc = :nbwc, nbbain = :nbbain, nbtotal = :nbtotal, cuisine = :cuisine, meuble = :meuble, ville = :ville, adresse = :adresse, prix = :prix, description = :description WHERE id = :id";

        $stmt = $pdo->prepare($updateQuery);

        // Assuming you have validation and sanitation for the input fields
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->bindParam(':titre', $_POST['titre']);
        $stmt->bindParam(':surface', $_POST['surface']);
        $stmt->bindParam(':etage', $_POST['etage']);
        $stmt->bindParam(':nbchambre', $_POST['nbchambre']);
        $stmt->bindParam(':nbsalon', $_POST['nbsalon']);
        $stmt->bindParam(':nbwc', $_POST['nbwc']);
        $stmt->bindParam(':nbbain', $_POST['nbbain']);
        $stmt->bindParam(':nbtotal', $_POST['nbtotal']);
        $stmt->bindParam(':cuisine', $_POST['cuisine']);
        $stmt->bindParam(':meuble', $_POST['meuble']);
        $stmt->bindParam(':ville', $_POST['ville']);
        $stmt->bindParam(':adresse', $_POST['adresse']);
        $stmt->bindParam(':prix', $_POST['prix']);
        $stmt->bindParam(':description', $_POST['des']); // Change this table name if needed
    } elseif ($id_cat == 2) {
        $updateQuery = "UPDATE materiaux SET ";
        $updateQuery .= " titre = :titre,type = :type, etat = :etat, ville = :ville, adresse = :adresse, prix = :prix, prix1 = :prix1, prix2 = :prix2, prix3 = :prix3, description = :description, image1 = :image1, image2 = :image2, image3 = :image3, image4 = :image4 WHERE id = :id";

        $stmt = $pdo->prepare($updateQuery);

        // Assuming you have validation and sanitation for the input fields
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titre', $_POST['titre']);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->bindParam(':etat', $_POST['etat']);
        $stmt->bindParam(':ville', $_POST['ville']);
        $stmt->bindParam(':adresse', $_POST['adresse']);
        $stmt->bindParam(':prix', $_POST['prix']);
        $stmt->bindParam(':prix1', $_POST['prix1']);
        $stmt->bindParam(':prix2', $_POST['prix2']);
        $stmt->bindParam(':prix3', $_POST['prix3']);
        $stmt->bindParam(':description', $_POST['des']);
        $stmt->bindParam(':image1', $_FILES['image_1']['name']);
        $stmt->bindParam(':image2', $_FILES['image_2']['name']);
        $stmt->bindParam(':image3', $_FILES['image_3']['name']);
        $stmt->bindParam(':image4', $_FILES['image_4']['name']);
    } elseif ($id_cat == 3) {
        $updateQuery = "UPDATE evenement SET ";
        // Append the columns you want to update
        $updateQuery .= "titre = :titre,type = :type, etat = :etat, ville = :ville, adresse = :adresse, prix = :prix, prix1 = :prix1, prix2 = :prix2, prix3 = :prix3, description = :description WHERE id = :id";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($updateQuery);

        // Bind parameters
        $stmt->bindParam(':titre', $_POST['titre']);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->bindParam(':etat', $_POST['etat']);
        $stmt->bindParam(':ville', $_POST['ville']);
        $stmt->bindParam(':adresse', $_POST['adresse']);
        $stmt->bindParam(':prix', $_POST['prix']);
        $stmt->bindParam(':prix1', $_POST['prix1']);
        $stmt->bindParam(':prix2', $_POST['prix2']);
        $stmt->bindParam(':prix3', $_POST['prix3']);
        $stmt->bindParam(':description', $_POST['des']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }




    $stmt->execute();

    // Redirect to a success page or perform other actions
    header('Location: in1.php'); // Change the URL as needed
    exit();
} else {
    header('Location: modifier_annonce.php');
}
