<?php
require("connexion_server/connexion.php");

if (isset($_GET['id']) && isset($_GET['id_cat'])) {
    $id = $_GET['id'];
    $id_cat = $_GET['id_cat'];

    // Perform database query to retrieve data based on id and id_cat
    $query = "SELECT * FROM ";

    if ($id_cat == 1) {
        $query .= "immoubilier";
    } elseif ($id_cat == 2) {
        $query .= "materiaux";
    } elseif ($id_cat == 3) {
        $query .= "evenement";
    }

    $query .= " WHERE id = :id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        header('location in1.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Changer votre annonce</title>
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


    <link href="css/style3.css" rel="stylesheet">
</head>

<body>
    <?php include('entete.php') ?>
    <div class="container-fluid py-5 mt-5">
        <h1 class='text-center'>Modifier votre item</h1>

        <?php if (isset($id) && isset($id_cat)) : ?>
            <div class="wrapper">
                <form method="POST" action="action_modifier_annonce.php?id=<?php echo $id; ?>&id_cat=<?php echo $id_cat; ?>" enctype="multipart/form-data">


                    <?php if ($id_cat == 1) : ?>

                        <h4>Type</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <select class="option" name="type" required>
                                    <option <?php if ($item['type'] === 'Appartement') echo 'selected'; ?>>Appartement</option>
                                    <option <?php if ($item['type'] === 'Maison') echo 'selected'; ?>>Maison</option>
                                    <option <?php if ($item['type'] === 'Villa') echo 'selected'; ?>>Villa</option>
                                    <option <?php if ($item['type'] === 'Terrain') echo 'selected'; ?>>Terrain</option>
                                    <option <?php if ($item['type'] === 'Ferme') echo 'selected'; ?>>Ferme</option>
                                    <option <?php if ($item['type'] === 'Duplex') echo 'selected'; ?>>Duplex</option>
                                    <option <?php if ($item['type'] === 'Riad') echo 'selected'; ?>>Riad</option>
                                    <option <?php if ($item['type'] === 'Bureau') echo 'selected'; ?>>Bureau</option>
                                    <option <?php if ($item['type'] === 'Garage') echo 'selected'; ?>>Garage</option>
                                    <option <?php if ($item['type'] === 'Plateau') echo 'selected'; ?>>Plateau</option>
                                    <option <?php if ($item['type'] === 'Studio') echo 'selected'; ?>>Studio</option>
                                    <option <?php if ($item['type'] === 'Autre') echo 'selected'; ?>>Autre</option>
                                </select>
                            </div>
                        </div>

                        <h4>Titre</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['titre'] ?>" type="text" placeholder="Titre" class="name" name="titre" id="monInput" oninput="convertirEnMajuscules()" required>
                        </div>

                        <h4>Surface/m²</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['surface'] ?>" type="number" placeholder="Surface" class="name" name="surface" required>
                        </div>
                        <br>
                        <h4>Etage</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <select class="option" name="etage" required>
                                    <option <?php if ($item['etage'] === 'RDC') echo 'selected'; ?>>RDC</option>
                                    <option <?php if ($item['etage'] === '1') echo 'selected'; ?>>1</option>
                                    <option <?php if ($item['etage'] === '2') echo 'selected'; ?>>2</option>
                                    <option <?php if ($item['etage'] === '3') echo 'selected'; ?>>3</option>
                                    <option <?php if ($item['etage'] === '4') echo 'selected'; ?>>4</option>
                                    <option <?php if ($item['etage'] === '5') echo 'selected'; ?>>5</option>
                                    <option <?php if ($item['etage'] === '6') echo 'selected'; ?>>6</option>
                                    <option <?php if ($item['etage'] === '7') echo 'selected'; ?>>7</option>
                                    <option <?php if ($item['etage'] === '8') echo 'selected'; ?>>8</option>
                                    <option <?php if ($item['etage'] === '9') echo 'selected'; ?>>9</option>
                                    <option <?php if ($item['etage'] === 'autre') echo 'selected'; ?>>Autre</option>
                                </select>
                            </div>
                        </div>

                        <h4>NB Chambres</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['nbchambre'] ?>" type="number" placeholder="Nombre de chambre" class="name" name="nbchambre">
                        </div>

                        <h4>NB Salons</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['nbsalon'] ?>" type="number" placeholder="Nombre de salon" class="name" name="nbsalon">
                        </div>

                        <h4>NB de WC</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['nbwc'] ?>" type="number" placeholder="Nombre de WC" class="name" name="nbwc">
                        </div>

                        <h4>NB Salle de Bains</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['nbbain'] ?>" type="number" placeholder="Nombre de salle de bains" class="name" name="nbbain">
                        </div>

                        <h4>NB Total de Pièces</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['nbtotal'] ?>" type="number" placeholder="Nombre total de piéces" class="name" name="nbtotal">
                        </div>

                        <h4>Cuisine</h4>
                        <input type="radio" name="cuisine" value="equipe" <?php if ($item['cuisine'] === 'equipe') echo 'checked'; ?> required>
                        <label>Equipé</label><br>

                        <input type="radio" name="cuisine" value="non equipe" <?php if ($item['cuisine'] === 'non equipe') echo 'checked'; ?>>
                        <label>Non Equipé</label><br>

                        <input type="radio" name="cuisine" value="autre" <?php if ($item['cuisine'] === 'autre') echo 'checked'; ?>>
                        <label>Autre</label><br>


                        <h4>Meublé</h4>
                        <input type="radio" name="meuble" value="oui" <?php if ($item['meuble'] === 'oui') echo 'checked'; ?> required>
                        <label>OUI</label><br>

                        <input type="radio" name="meuble" value="non" <?php if ($item['meuble'] === 'non') echo 'checked'; ?>>
                        <label>Non</label><br>

                        <input type="radio" name="meuble" value="autre" <?php if ($item['meuble'] === 'autre') echo 'checked'; ?>>
                        <label>Autre</label><br>


                        <h4>Ville</h4>
                        <div class="input-group">
                            <div class="input-box">

                                <select class="option" name="ville" required>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>Rabat</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Salé</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Témara</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Kenitra</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Casablanca</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Tanger</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Fes</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Mekens</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Marakech</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Ifran</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Aoune</option>
                                    <option <?php if ($item['ville'] === 'autre') echo 'selected'; ?>>>Autre</option>
                                </select>

                            </div>
                        </div>

                        <h4>Adresse</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <input value="<?php echo $item['adresse'] ?>" type="text" placeholder="Saisi l'adresse" class="name" name="adresse" required>

                            </div>
                        </div>

                        <h4>Prix/Dhs/jour</h4>
                        <div class="input-box">
                            <input value="<?php echo $item['prix'] ?>" type="number" placeholder="Prix" class="name" name="prix" required>
                        </div>

                        <h4>Description</h4>
                        <div class="input-box">
                            <textarea placeholder="Votre description " class="name" name="des" rows="4" cols="50" required><?php echo $item['description'] ?></textarea>
                        </div>

                        <h4>Images</h4>
                        <div class="input-box">
                            <input type="file" class="form-control" name="image 1" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image1']) echo '<span>Image 1: ' . $item['image1'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image 2" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image2']) echo '<span>Image 2 ' . $item['image2'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image 3" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image3']) echo '<span>Image 3: ' . $item['image3'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image4" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image4']) echo '<span>Image 4: ' . $item['image4'] . '</span>'; ?>
                            <br>
                        </div>

                        <?php

                        if (isset($_SESSION['email']) && ($_SESSION['mot'])) {
                        ?>
                            <div class="input-box">
                                <input type="hidden" class="name" name="email" value="<?php echo $_SESSION['email'] ?>" disabled="disabled">

                            </div>


                        <?php
                        }
                        ?>
                        <!-- Materiaux -->
                    <?php elseif ($id_cat == 2) : ?>

                        <h4>Titre</h4>
                        <div class="input-box">
                            <input type="text" placeholder="Titre" class="name" name="titre" id="monInput" oninput="convertirEnMajuscules()" required value="<?php echo $item['titre']; ?>">
                        </div>
                        <h4>Type</h4>
                        <div class='input-group'>
                            <div class="input-box">
                                <select class="option" name="type" required>
                                    <option value="Caméras" <?php if ($item['type'] === 'Caméras') echo 'selected'; ?>>Caméras</option>
                                    <option value="Jeux/Jouets" <?php if ($item['type'] === 'Jeux/Jouets') echo 'selected'; ?>>Jeux/Jouets</option>
                                    <option value="Livres" <?php if ($item['type'] === 'Livres') echo 'selected'; ?>>Livres</option>
                                    <option value="Electromenager" <?php if ($item['type'] === 'Electromenager') echo 'selected'; ?>>Electromenager</option>
                                    <option value="Sport" <?php if ($item['type'] === 'Sport') echo 'selected'; ?>>Sport</option>
                                    <option value="Musique" <?php if ($item['type'] === 'Musique') echo 'selected'; ?>>Musique</option>
                                    <option value="Informatique et High-Tech" <?php if ($item['type'] === 'Informatique et High-Tech') echo 'selected'; ?>>Informatique et High-Tech</option>
                                    <option value="Equipement Auto" <?php if ($item['type'] === 'Equipement Auto') echo 'selected'; ?>>Equipement Auto</option>
                                    <option value="Jardinage" <?php if ($item['type'] === 'Jardinage') echo 'selected'; ?>>Jardinage</option>
                                    <option value="Matérial Bricollage" <?php if ($item['type'] === 'Matérial Bricollage') echo 'selected'; ?>>Matérial Bricollage</option>
                                    <option value="Matérial Tournage" <?php if ($item['type'] === 'Matérial Tournage') echo 'selected'; ?>>Matérial Tournage</option>
                                    <option value="Autre" <?php if ($item['type'] === 'Autre') echo 'selected'; ?>>Autre</option>
                                </select>
                            </div>
                        </div>
                        <h4>Etat</h4>
                        <input type="radio" name="etat" value="neuf" required <?php if ($item['etat'] === 'neuf') echo 'checked'; ?>>
                        <label>Neuf</label><br>
                        <input type="radio" name="etat" value="bon" <?php if ($item['etat'] === 'bon') echo 'checked'; ?>>
                        <label>Bon</label><br>
                        <input type="radio" name="etat" value="moyen" <?php if ($item['etat'] === 'moyen') echo 'checked'; ?>>
                        <label>Moyen</label>


                        <h4>Ville</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <select class="option" name="ville" required>
                                    <option value="" selected>Choisi la ville</option>
                                    <option value="Rabat" <?php if ($item['ville'] === 'Rabat') echo 'selected'; ?>>Rabat</option>
                                    <option value="Salé" <?php if ($item['ville'] === 'Salé') echo 'selected'; ?>>Salé</option>
                                    <option value="Témara" <?php if ($item['ville'] === 'Témara') echo 'selected'; ?>>Témara</option>
                                    <option value="Kenitra" <?php if ($item['ville'] === 'Kenitra') echo 'selected'; ?>>Kenitra</option>
                                    <option value="Casablanca" <?php if ($item['ville'] === 'Casablanca') echo 'selected'; ?>>Casablanca</option>
                                    <option value="Tanger" <?php if ($item['ville'] === 'Tanger') echo 'selected'; ?>>Tanger</option>
                                    <option value="Fes" <?php if ($item['ville'] === 'Fes') echo 'selected'; ?>>Fes</option>
                                    <option value="Mekens" <?php if ($item['ville'] === 'Mekens') echo 'selected'; ?>>Mekens</option>
                                    <option value="Marakech" <?php if ($item['ville'] === 'Marakech') echo 'selected'; ?>>Marakech</option>
                                    <option value="Ifran" <?php if ($item['ville'] === 'Ifran') echo 'selected'; ?>>Ifran</option>
                                    <option value="Aoune" <?php if ($item['ville'] === 'Aoune') echo 'selected'; ?>>Aoune</option>
                                    <option value="Autre" <?php if ($item['ville'] === 'Autre') echo 'selected'; ?>>Autre</option>
                                </select>

                            </div>
                        </div>

                        <h4>Adresse</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <input type="text" placeholder="Saisi l'adresse" class="name" name="adresse" required value="<?php echo $item['adresse']; ?>">
                            </div>
                        </div>

                        <h4>Prix/Dhs/Heure</h4>
                        <div class="input-box">
                            <input type="number" placeholder="Prix" class="name" name="prix" required value="<?php echo $item['prix']; ?>">
                        </div>
                        <h4>Prix/Dhs/Jour</h4>
                        <div class="input-box">
                            <input type="number" placeholder="Prix" class="name" name="prix1" required value="<?php echo $item['prix1']; ?>">
                        </div>
                        <h4>Prix/Dhs/Semaine</h4>
                        <div class="input-box">
                            <input type="number" placeholder="Prix" class="name" name="prix2" required value="<?php echo $item['prix2']; ?>">
                        </div>
                        <h4>Prix/Dhs/Mois</h4>
                        <div class="input-box">
                            <input type="number" placeholder="Prix" class="name" name="prix3" required value="<?php echo $item['prix3']; ?>">
                        </div>

                        <h4>Description</h4>
                        <div class="input-box">
                            <textarea placeholder="Plus de caractéristiques sur objets" class="name" name="des" rows="4" cols="50" required><?php echo $item['description']; ?></textarea>
                        </div>

                        <h4>Images</h4>
                        <div class="input-box">
                            <input type="file" class="form-control" name="image 1" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image1']) echo '<span>Image 1: ' . $item['image1'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image 2" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image2']) echo '<span>Image 2 ' . $item['image2'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image 3" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image3']) echo '<span>Image 3: ' . $item['image3'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image4" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image4']) echo '<span>Image 4: ' . $item['image4'] . '</span>'; ?>
                            <br>
                        </div>

                    <?php elseif ($id_cat == 3) : ?>

                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                        <input type="hidden" name="id_cat" value="<?php echo $item['id_cat']; ?>">

                        <h4>Titre</h4>
                        <div class="input-box">
                            <input type="text" placeholder="Titre" class="name" name="titre" id="monInput" oninput="convertirEnMajuscules()" value="<?php echo $item['titre']; ?>" required>
                        </div>
                        <h4>Type</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <select class="option" name="type" required>
                                    <option value="Accessoires Femme" <?php if ($item['type'] === 'Accessoires Femme') echo 'selected'; ?>>Accessoires Femme</option>
                                    <option value="Accessoires Homme" <?php if ($item['type'] === 'Accessoires Homme') echo 'selected'; ?>>Accessoires Homme</option>
                                    <option value="Vêtements de Cérémonie Femme" <?php if ($item['type'] === 'Vêtements de Cérémonie Femme') echo 'selected'; ?>>Vêtements de Cérémonie Femme</option>
                                    <option <?php if ($item['type'] === 'Tente et Immoubilier pour événements') echo 'selected'; ?>>Tente et Immoubilier pour événements</option>
                                    <option <?php if ($item['type'] === 'Animation') echo 'selected'; ?>>Animation</option>
                                    <option <?php if ($item['type'] === 'Autre') echo 'selected'; ?>>Autre</option>
                                </select>
                            </div>
                        </div>


                        <h4>Etat</h4>
                        <input type="radio" name="etat" value="neuf" <?php if ($item['etat'] === 'neuf') echo 'checked'; ?> required>
                        <label>Neuf</label><br>
                        <input type="radio" name="etat" value="Bon" <?php if ($item['etat'] === 'Bon') echo 'checked'; ?>>
                        <label>Bon</label><br>
                        <input type="radio" name="etat" value="Moyen" <?php if ($item['etat'] === 'Moyen') echo 'checked'; ?>>
                        <label>Moyen</label><br>

                        <h4>Ville</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <select class="option" name="ville" required>
                                    <option value="Rabat" <?php if ($item['ville'] === 'Rabat') echo 'selected'; ?>>Rabat</option>
                                    <option value="Salé" <?php if ($item['ville'] === 'Salé') echo 'selected'; ?>>Salé</option>
                                    <option value="Témara" <?php if ($item['ville'] === 'Témara') echo 'selected'; ?>>Témara</option>
                                    <option value="Kenitra" <?php if ($item['ville'] === 'Kenitra') echo 'selected'; ?>>Kenitra</option>
                                    <option value="Casablanca" <?php if ($item['ville'] === 'Casablanca') echo 'selected'; ?>>Casablanca</option>
                                    <option value="Tanger" <?php if ($item['ville'] === 'Tanger') echo 'selected'; ?>>Tanger</option>
                                    <option value="Fes" <?php if ($item['ville'] === 'Fes') echo 'selected'; ?>>Fes</option>
                                    <option value="Meknes" <?php if ($item['ville'] === 'Meknes') echo 'selected'; ?>>Meknes</option>
                                    <option value="Marrakech" <?php if ($item['ville'] === 'Marrakech') echo 'selected'; ?>>Marrakech</option>
                                    <option value="Ifran" <?php if ($item['ville'] === 'Ifran') echo 'selected'; ?>>Ifran</option>
                                    <option value="Aoune" <?php if ($item['ville'] === 'Aoune') echo 'selected'; ?>>Aoune</option>
                                    <option value="Autre" <?php if ($item['ville'] === 'Autre') echo 'selected'; ?>>Autre</option>
                                </select>
                            </div>
                        </div>

                        <h4>Adresse</h4>
                        <div class="input-group">
                            <div class="input-box">
                                <input type="text" placeholder="Saisi l'adresse" class="name" name="adresse" value="<?php echo $item['adresse']; ?>" required>
                            </div>
                        </div>

                        <h4>Prix/Dhs/Heure</h4>
                        <div class="input-box">
                            <input type="text" placeholder="Prix" class="name" name="prix" value="<?php echo $item['prix']; ?>" required>
                        </div>
                        <h4>Prix/Dhs/Jour</h4>
                        <div class="input-box">
                            <input type="text" placeholder="Prix" class="name" name="prix1" value="<?php echo $item['prix1']; ?>" required>
                        </div>
                        <h4>Prix/Dhs/Semaine</h4>
                        <div class="input-box">
                            <input type="text" placeholder="Prix" class="name" name="prix2" value="<?php echo $item['prix2']; ?>">
                        </div>
                        <h4>Prix/Dhs/Mois</h4>
                        <div class="input-box">
                            <input type="text" placeholder="Prix" class="name" name="prix3" value="<?php echo $item['prix3']; ?>">
                        </div>

                        <h4>Description</h4>
                        <div class="input-box">
                            <textarea placeholder="Plus de caractéristique sur objets" class="name" name="des" rows="4" cols="50" required><?php echo $item['description']; ?></textarea>
                        </div>
                        <h4>Images</h4>
                        <div class="input-box">
                            <input type="file" class="form-control" name="image 1" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image1']) echo '<span>Image 1: ' . $item['image1'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image 2" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image2']) echo '<span>Image 2 ' . $item['image2'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image 3" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image3']) echo '<span>Image 3: ' . $item['image3'] . '</span>'; ?>
                            <br>

                            <input type="file" class="form-control" name="image4" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <?php if ($item['image4']) echo '<span>Image 4: ' . $item['image4'] . '</span>'; ?>
                            <br>
                        </div>
                        <?php
                        if (isset($_SESSION['email']) && ($_SESSION['mot'])) {
                        ?>
                            <div class="input-box">
                                <input type="hidden" class="name" name="email" value="<?php echo $_SESSION['email'] ?>" disabled="disabled">
                            </div>
                        <?php
                        }
                        ?>
                    <?php endif; ?>

                    <button type="submit">Modifier</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</body>

</html>