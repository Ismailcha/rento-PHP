<?php
include("connexion_server/connexion.php");
if(isset($_POST['nom'])&&($_POST['tel'])&&($_POST['ville'])&&($_POST['email'])&&($_POST['mot']))
{
 $n=$_POST['nom'];
 $t=$_POST['tel'];
 $v=$_POST['ville'];
 $e=$_POST['email'];
 $m=$_POST['mot'];
 $c=$_POST['cmot'];
 $type="particulier";
 
 if($m!=$c)
 {
    header("location:inscription.php?errur=Erreur de confirmation de mot passe");
 }
 

 else
 {
    try
    {
    
    $mot=password_hash($m,PASSWORD_DEFAULT);  
    $req=$pdo->prepare("insert into utilisateur (nom_prenom,tel,ville,email,mot_passe,type)values(:nom,:tel,:ville,:email,:motpasse,:type)");
    $req->bindValue(':nom',$n, PDO::PARAM_STR);
    $req->bindValue(':tel',$t, PDO::PARAM_STR);
    $req->bindValue(':ville',$v, PDO::PARAM_STR);
    $req->bindValue(':email',$e, PDO::PARAM_STR);
    $req->bindValue(':motpasse',$mot, PDO::PARAM_STR);
    $req->bindValue(':type',$type, PDO::PARAM_STR);
    $req->execute();
    if($req==false)
    {
        header("location:inscription.php?errur=Problème d'inscription");
      
    }
    else
    {
        header("location:inscription.php?errur=Inscription bien réussi");
    }
    }
    catch(PDOException $e)
        {
           echo "Message Erreur : " . $e->getMessage();
        }
    
}
}
else
{
    header("location:inscription.php");
}

 	
?>