<?php
session_start();
include("connexion_server/connexion.php");

if (
    isset($_POST['type']) && ($_POST['titre']) && ($_POST['etat']) && ($_POST['ville'])
    && ($_POST['adresse']) && ($_POST['prix']) && ($_POST['des'])
) {
    if (isset($_SESSION['email']) && ($_SESSION['mot'])) {
        $email = $_SESSION['email'];
        $mot = $_SESSION['mot'];
        $type = $_POST['type'];
        $ville = $_POST['ville'];



        $req1 = $pdo->prepare('select * from utilisateur where email=:email');

        $req1->bindValue(':email', $email, PDO::PARAM_STR);
        $req1->execute();
        $tableau1 = $req1->fetch(PDO::FETCH_ASSOC);


        if ($tableau1 == false) {
            header("location:annonce2.php?errur=email ou mot de passe incorecte");
        } elseif (password_verify($mot, $tableau1['mot_passe'])) {

            if ($_POST['type'] == "Choisi le Type d'Evénements" || $_POST['ville'] == "Choisi une Ville<") {
                header("location:annonce2.php?errur=Vous avez pas bien utiliser la liste des choix");
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
                $etat = $_POST['etat'];
                $adresse = $_POST['adresse'];
                $prix = $_POST['prix'];
                $prix1 = $_POST['prix1'];
                $prix2 = $_POST['prix2'];
                $prix3 = $_POST['prix3'];
                $des = $_POST['des'];


                $categorie = "3";

                $req3 = $pdo->prepare("insert into evenement (type,titre,etat,ville,adresse,prix,prix1,prix2,prix3,
            description,image1,image2,image3,image4,email,id_cat) values(:type,:titre,:etat,:ville,:adresse,
            :prix,:prix1,:prix2,:prix3,:des,:image1,:image2,:image3,:image4,:email,:categorie)");
                $req3->bindvalue(':type', $type);
                $req3->bindvalue(':titre', $titre);
                $req3->bindvalue(':etat', $etat);
                $req3->bindvalue(':ville', $ville);
                $req3->bindvalue(':adresse', $adresse);
                $req3->bindvalue(':prix', $prix);
                $req3->bindvalue(':prix1', $prix1);
                $req3->bindvalue(':prix2', $prix2);
                $req3->bindvalue(':prix3', $prix3);
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
                    header("location:annonce2.php?errur=Bien Enregistrer");
                } else {
                    // si enregistrement est pas valider
                    header("location:annonce2.php?errur=Probléme D'enregistrement");
                }
            } else {
                header("location:annonce2.php?errur=taille du fichier dépasse la limite autoriser");
            }
        } else {
            header("location:annonce2.php?errur=Données de connexion sont incorrecte");
        }
    }



    //2eme partie
    else {
        $email = $_POST['email'];
        $mot = $_POST['mot'];
        $type = $_POST['type'];
        $ville = $_POST['ville'];



        $req1 = $pdo->prepare('select * from utilisateur where email=:email');

        $req1->bindValue(':email', $email, PDO::PARAM_STR);
        $req1->execute();
        $tableau1 = $req1->fetch(PDO::FETCH_ASSOC);


        if ($tableau1 == false) {
            header("location:annonce2.php?errur=email ou mot de passe incorecte");
        } elseif (password_verify($mot, $tableau1['mot_passe'])) {

            if ($_POST['type'] == "Choisi le Type d'Evénements" || $_POST['ville'] == "Choisi une Ville") {
                header("location:annonce2.php?errur=Vous avez pas bien utiliser la liste des choix");
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
                $etat = $_POST['etat'];
                $adresse = $_POST['adresse'];
                $prix = $_POST['prix'];
                $prix1 = $_POST['prix1'];
                $prix2 = $_POST['prix2'];
                $prix3 = $_POST['prix3'];
                $des = $_POST['des'];


                $categorie = "3";



                $req3 = $pdo->prepare("insert into evenement (type,titre,etat,ville,adresse,prix,prix1,prix2,prix3,
        description,image1,image2,image3,image4,email,id_cat) values(:type,:titre,:etat,:ville,:adresse,
        :prix,:prix1,:prix2,:prix3,:des,:image1,:image2,:image3,:image4,:email,:categorie)");
                $req3->bindvalue(':type', $type);
                $req3->bindvalue(':titre', $titre);
                $req3->bindvalue(':etat', $etat);
                $req3->bindvalue(':ville', $ville);
                $req3->bindvalue(':adresse', $adresse);
                $req3->bindvalue(':prix', $prix);
                $req3->bindvalue(':prix1', $prix1);
                $req3->bindvalue(':prix2', $prix2);
                $req3->bindvalue(':prix3', $prix3);
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
                    header("location:annonce2.php?errur=Bien Enregistrer");
                } else {
                    // si enregistrement est pas valider
                    header("location:annonce2.php?errur=Probléme D'enregistrement");
                }
            } else {
                header("location:annonce2.php?errur=taille du fichier dépasse la limite autoriser");
            }
        } else {
            header("location:annonce2.php?errur=Données de connexion sont incorrecte");
        }
    }
} else {
    header("location:annonce2.php");
}
