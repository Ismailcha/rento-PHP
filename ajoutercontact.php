<?php
include("connexion_server/connexion.php");
if(isset($_POST['nom'])&&($_POST['email'])&&($_POST['message']))
{
 $n=$_POST['nom'];
 $e=$_POST['email'];
 $s=$_POST['sujet'];
 $m=$_POST['message'];
 
    try
    {
    
  
    $req=$pdo->prepare("insert into contact (nom,email,sujet,message)values(:nom,:email,:sujet,:message)");
    $req->bindValue(':nom',$n, PDO::PARAM_STR);
    $req->bindValue(':email',$e, PDO::PARAM_STR);
    $req->bindValue(':sujet',$s, PDO::PARAM_STR);
    $req->bindValue(':message',$m, PDO::PARAM_STR);
   
    $req->execute();
    if($req==false)
    {
        header("location:contact.php?errur=Message Erroné");
      
    }
    else
    {
        header("location:contact.php?errur=Message Bien Réussi");
    }
    }
    catch(PDOException $e)
        {
           echo "Message Erreur : " . $e->getMessage();
        }
    
}

else
{
    header("location:contact.php");
}
