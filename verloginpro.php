<?php
session_start();
require_once("connexion_server/connexion.php");
if(isset($_POST['email'])&&($_POST['mot']))
{
   $e=$_POST['email'];
   $p=$_POST['mot'];
   
   $req1=$pdo->prepare('select * from utilisateurpro where email=:email and mot_passe=:pass');
   $req1->bindValue(':email',$e,PDO::PARAM_STR);
   $req1->bindValue(':pass',$p.'p',PDO::PARAM_STR);
   $req1->execute();
   $tableau=$req1->fetch(PDO::FETCH_ASSOC);
   if($tableau==true)
   {
    $_SESSION['email']=$e;
    $_SESSION['mot']=$p;
    header("location:index.php?login");
   }
   else
   {
    header("location:login.php?errur=email ou mot de passe incorecte");
    
   }
}
else
{
  header("location:loginpro.php");
}
