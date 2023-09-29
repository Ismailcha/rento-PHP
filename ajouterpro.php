<?php
include("connexion_server/connexion.php");
if(isset($_POST['nom'])&&($_POST['tel'])&&($_POST['ville'])&&($_POST['email'])&&($_POST['mot'])&&($_POST['domaine'])&&($_POST['raison']))
{
 $n=$_POST['nom'];
 $t=$_POST['tel'];
 $v=$_POST['ville'];
 $e=$_POST['email'];
 $m=$_POST['mot'];
 $c=$_POST['cmot'];
 $d=$_POST['domaine'];
 $r=$_POST['raison'];
 $type="professionnel";
 if($m!=$c)
 {
    header("location:inscriptionpro.php?errur=Erreur de confirmation de mot passe");
 }
 elseif($_FILES['logo']['size']<=5000000 )
 {

     
      $temp1=$_FILES['logo']['tmp_name'];
      $nf1=$_FILES['logo']['name'];
               
 
    try
    {
   
    $mot=password_hash($m,PASSWORD_DEFAULT); 
    $req=$pdo->prepare("insert into utilisateur (nom_prenom,tel,ville,email,mot_passe,domaine,nom_boutique,type,logo)values(:nom,:tel,:ville,:email,:motpasse,:domaine,:raison,:type,:logo)");
    $req->bindValue(':nom',$n);
    $req->bindValue(':tel',$t);
    $req->bindValue(':ville',$v);
    $req->bindValue(':email',$e);
    $req->bindValue(':motpasse',$mot);
    $req->bindValue(':domaine',$d);
    $req->bindValue(':raison',$r);
    $req->bindValue(':type',$type);
    $req->bindValue(':logo',$nf1);
    $req->execute();
    if($req==false)
    {
        header("location:inscriptionpro.php?errur=Problème d'inscription");
      
    }
    else
    {
        move_uploaded_file($temp1,"img/".$nf1);
        header("location:inscriptionpro.php?errur=Inscription bien réussi");
    }
   }
   catch(PDOException $e)
        {
           echo "Message Erreur : " . $e->getMessage();
        }
 }
 else
 {
     header("location:inscriptionpro.php?errur=taille du fichier dépasse la limite autoriser");
 }
    
}
else
{
    header("location:inscriptionpro.php");
}
?>