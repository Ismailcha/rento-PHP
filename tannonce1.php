<?php
session_start();
include("connexion_server/connexion.php");

if (
    isset($_POST['type']) && ($_POST['titre']) && ($_POST['surface']) && ($_POST['etage'])
    && ($_POST['ville']) && ($_POST['adresse']) && ($_POST['prix']) && ($_POST['des'])
) {
    if (isset($_SESSION['email']) && ($_SESSION['mot'])) {
        $email = $_SESSION['email'];
        $mot = $_SESSION['mot'];
        $type = $_POST['type'];
        $etage = $_POST['etage'];
        $ville = $_POST['ville'];

        $req1 = $pdo->prepare('select * from utilisateur where email=:email');

        $req1->bindValue(':email', $email, PDO::PARAM_STR);
        $req1->execute();
        $tableau1 = $req1->fetch(PDO::FETCH_ASSOC);


        if ($tableau1 == false) {
            header("location:annonce1.php?errur=email ou mot de passe incorecte");
        } elseif (password_verify($mot, $tableau1['mot_passe'])) {

            if ($_POST['type'] == "Choisi le Type d'Immoubiliers" || $_POST['etage'] == "Choisi l'Etage d'Immoubiliers" || $_POST['ville'] == "Choisi la ville") {
                header("location:annonce1.php?errur=Vous avez pas bien utiliser la liste des choix");
            } elseif ($_FILES['image1']['size'] <= 5000000 && $_FILES['image2']['size'] <= 5000000 && $_FILES['image3']['size'] <= 5000000 && $_FILES['image4']['size'] <= 5000000) {


                $temp1 = $_FILES['image1']['tmp_name'];
                $temp2 = $_FILES['image2']['tmp_name'];
                $temp3 = $_FILES['image3']['tmp_name'];
                $temp4 = $_FILES['image4']['tmp_name'];

                $nf1 = $_FILES['image1']['name'];
                $nf2 = $_FILES['image2']['name'];
                $nf3 = $_FILES['image3']['name'];
                $nf4 = $_FILES['image4']['name'];


                $titre = $_POST['titre'];
                $surf = $_POST['surface'];



                $nbc = $_POST['nbchambre'];
                $nbs = $_POST['nbsalon'];
                $nbwc = $_POST['nbwc'];
                $nbbain = $_POST['nbbain'];
                $nbtot = $_POST['nbtotal'];


                $adresse = $_POST['adresse'];
                $prix = $_POST['prix'];
                $des = $_POST['des'];

                $cuisine = $_POST['cuisine'];
                $meuble = $_POST['meuble'];
                $categorie = "1";

                $req3 = $pdo->prepare("insert into immoubilier (type,titre,surface,etage,nbchambre,nbsalon,nbwc,nbbain,nbtotal,cuisine,meuble,ville,
            adresse,prix,description,image1,image2,image3,image4,id_cat,email) values(:type,:titre,:surface,:etage,:nbchambre,
            :nbsalon,:nbwc,:nbbain,:nbtotal,:cuisine,
            :meuble,:ville,:adresse,:prix,:des,:image1,:image2,:image3,:image4,:categorie,:email)");
                $req3->bindvalue(':type', $type);
                $req3->bindvalue(':titre', $titre);
                $req3->bindvalue(':surface', $surf);
                $req3->bindvalue(':etage', $etage);
                $req3->bindvalue(':nbchambre', $nbc);
                $req3->bindvalue(':nbsalon', $nbs);
                $req3->bindvalue(':nbwc', $nbwc);
                $req3->bindvalue(':nbbain', $nbbain);
                $req3->bindvalue(':nbtotal', $nbtot);
                $req3->bindvalue(':cuisine', $cuisine);
                $req3->bindvalue(':meuble', $meuble);
                $req3->bindvalue(':ville', $ville);
                $req3->bindvalue(':adresse', $adresse);
                $req3->bindvalue(':prix', $prix);
                $req3->bindvalue(':des', $des);
                $req3->bindvalue(':image1', $nf1);
                $req3->bindvalue(':image2', $nf2);
                $req3->bindvalue(':image3', $nf3);
                $req3->bindvalue(':image4', $nf4);
                $req3->bindvalue(':categorie', $categorie);
                $req3->bindvalue(':email', $email);




                $isok = $req3->execute();
                if ($isok) {

                    move_uploaded_file($temp1, "img/" . $nf1);
                    move_uploaded_file($temp2, "img/" . $nf2);
                    move_uploaded_file($temp3, "img/" . $nf3);
                    move_uploaded_file($temp4, "img/" . $nf4);
                    header("location:annonce1.php?errur=Bien Enregistrer");
                } else {
                    // si enregistrement est pas valider
                    header("location:annonce1.php?errur=Probléme D'enregistrement");
                }
            } else {
                header("location:annonce1.php?errur=taille du fichier dépasse la limite autoriser");
            }
        } else {
            header("location:annonce1.php?errur=Données de connexion sont incorrecte");
        }
    }



    //2eme partie
    else {
        $email = $_POST['email'];
        $mot = $_POST['mot'];
        $type = $_POST['type'];
        $etage = $_POST['etage'];
        $ville = $_POST['ville'];

        $req1 = $pdo->prepare('select * from utilisateur where email=:email');

        $req1->bindValue(':email', $email, PDO::PARAM_STR);
        $req1->execute();
        $tableau1 = $req1->fetch(PDO::FETCH_ASSOC);


        if ($tableau1 == false) {
            header("location:annonce1.php?errur=email ou mot de passe incorecte");
        } elseif (password_verify($mot, $tableau1['mot_passe'])) {

            if ($_POST['type'] == "Choisi le Type d'Immoubiliers" || $_POST['etage'] == "Choisi l'Etage d'Immoubiliers" || $_POST['ville'] == "Choisi la ville") {
                header("location:annonce1.php?errur=Vous avez pas bien utiliser la liste des choix");
            } elseif ($_FILES['image1']['size'] <= 5000000 && $_FILES['image2']['size'] <= 5000000 && $_FILES['image3']['size'] <= 5000000 && $_FILES['image4']['size'] <= 5000000) {


                $temp1 = $_FILES['image1']['tmp_name'];
                $temp2 = $_FILES['image2']['tmp_name'];
                $temp3 = $_FILES['image3']['tmp_name'];
                $temp4 = $_FILES['image4']['tmp_name'];

                $nf1 = $_FILES['image1']['name'];
                $nf2 = $_FILES['image2']['name'];
                $nf3 = $_FILES['image3']['name'];
                $nf4 = $_FILES['image4']['name'];


                $titre = $_POST['titre'];
                $surf = $_POST['surface'];



                $nbc = $_POST['nbchambre'];
                $nbs = $_POST['nbsalon'];
                $nbwc = $_POST['nbwc'];
                $nbbain = $_POST['nbbain'];
                $nbtot = $_POST['nbtotal'];


                $adresse = $_POST['adresse'];
                $prix = $_POST['prix'];
                $des = $_POST['des'];

                $cuisine = $_POST['cuisine'];
                $meuble = $_POST['meuble'];
                $categorie = "1";

                $req3 = $pdo->prepare("insert into immoubilier (type,titre,surface,etage,nbchambre,nbsalon,nbwc,nbbain,nbtotal,cuisine,meuble,ville,
            adresse,prix,description,image1,image2,image3,image4,id_cat,email) values(:type,:titre,:surface,:etage,:nbchambre,
            :nbsalon,:nbwc,:nbbain,:nbtotal,:cuisine,
            :meuble,:ville,:adresse,:prix,:des,:image1,:image2,:image3,:image4,:categorie,:email)");
                $req3->bindvalue(':type', $type);
                $req3->bindvalue(':titre', $titre);
                $req3->bindvalue(':surface', $surf);
                $req3->bindvalue(':etage', $etage);
                $req3->bindvalue(':nbchambre', $nbc);
                $req3->bindvalue(':nbsalon', $nbs);
                $req3->bindvalue(':nbwc', $nbwc);
                $req3->bindvalue(':nbbain', $nbbain);
                $req3->bindvalue(':nbtotal', $nbtot);
                $req3->bindvalue(':cuisine', $cuisine);
                $req3->bindvalue(':meuble', $meuble);
                $req3->bindvalue(':ville', $ville);
                $req3->bindvalue(':adresse', $adresse);
                $req3->bindvalue(':prix', $prix);
                $req3->bindvalue(':des', $des);
                $req3->bindvalue(':image1', $nf1);
                $req3->bindvalue(':image2', $nf2);
                $req3->bindvalue(':image3', $nf3);
                $req3->bindvalue(':image4', $nf4);
                $req3->bindvalue(':categorie', $categorie);
                $req3->bindvalue(':email', $email);




                $isok = $req3->execute();
                if ($isok) {

                    move_uploaded_file($temp1, "img/" . $nf1);
                    move_uploaded_file($temp2, "img/" . $nf2);
                    move_uploaded_file($temp3, "img/" . $nf3);
                    move_uploaded_file($temp4, "img/" . $nf4);
                    header("location:annonce1.php?errur=Bien Enregistrer");
                } else {
                    // si enregistrement est pas valider
                    header("location:annonce1.php?errur=Probléme D'enregistrement");
                }
            } else {
                header("location:annonce1.php?errur=taille du fichier dépasse la limite autoriser");
            }
        } else {
            header("location:annonce1.php?errur=Données de connexion sont incorrecte");
        }
    }
} else {
    header("location:annonce1.php");
}
