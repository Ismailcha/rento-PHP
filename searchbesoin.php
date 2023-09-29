<?php
require("connexion_server/connexion.php");

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
        echo '<tr><td colspan="8">No results found.</td></tr>';
    }
}
