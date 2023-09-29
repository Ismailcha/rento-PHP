<?php
require("connexion_server/connexion.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $besoinId = $_GET['id'];

    // Delete the item
    $query = "DELETE FROM besoin WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $besoinId, PDO::PARAM_INT);
    $stmt->execute();

    // Redirect back to the list page
    header("Location: liste_besoin.php");
    exit();
}
