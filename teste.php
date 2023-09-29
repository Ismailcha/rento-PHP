<?php
//session_start();

require_once("connexion_server/connexion.php");

if(isset($_POST['email'])&&($_POST['mot']))
{
   $e=$_POST['email'];
   $p=$_POST['mot'];

   $req1 = $pdo->prepare("select * from utilisateur where email=:email");
   $req1->bindValue(':email',$e, PDO::PARAM_STR);
   $req1->execute();
   $result = $req1->fetch();
   
   if(password_verify($p, $result['mot_passe'])) 
   {
    header("location:index.php?login");
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
