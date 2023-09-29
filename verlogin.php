<?php
session_start();
require_once("connexion_server/connexion.php");
if(isset($_POST['email'])&&($_POST['mot']))
{
   $e=$_POST['email'];
   $p=$_POST['mot'];
   
   $req1=$pdo->prepare('select * from utilisateur where email=:email');
   $req1->bindValue(':email',$e,PDO::PARAM_STR);
  
   $req1->execute();
   $tableau=$req1->fetch(PDO::FETCH_ASSOC);
   if($tableau==true)
   {
    
    if (password_verify($p,$tableau['mot_passe']))
     {
      $_SESSION['email']=$_POST['email'];
      $_SESSION['mot']=$_POST['mot'];
      $_SESSION['type']=$tableau['type'];
      
      header("location:index.php");
     } 
    else 
    {
    header("location:login.php?errur=Données de connexion sont incorrecte");
    }

   }
   else
   {

    header("location:login.php?errur=email ou mot de passe incorecte");
    
   }
}
else
{
  header("location:login.php");
}
