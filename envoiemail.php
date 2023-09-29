<?php
require_once("connexion_server/connexion.php");
if (isset($_POST['email']))
{
$email=$_POST['email'];
$req = $pdo->prepare('select * from utilisateur where email =:email');
$req->bindValue(':email', $email);
$req->execute();
$resultat = $req->fetch(PDO::FETCH_ASSOC);
if ($resultat==false)
{
     header("Location:motoublie.php?erreur=Email est incorrecte");
}
else
{
$token = bin2hex(openssl_random_pseudo_bytes(5));
/////voici la version Mine
$headers = "MIME-Version: 1.0\r\n";
//////ici on détermine le mail en format text
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: elonet@hotmail.fr\r\n";
$sujet="Réinitialisation de votre mot de passe ";
$destinataire=$email;
$message = "Suite à votre demande de Réinitialisation de votre mot de passe, cliquez ici : ";
$message.="<a href='http://ecommerce.byethost17.com/changer/newlogin.php?email=$email&token=$token'>Lien pour Réinitialiser votre mot de passe </a>";
if (mail($destinataire,$sujet,$message,$headers))
     {        
          $req = $pdo->prepare("UPDATE utilisateur SET token= :token WHERE email= :email");
          $req->bindValue(':token',$token);
          $req->bindValue(':email',$email, PDO::PARAM_STR);
          $req->execute();		
          header("Location:motoublie.php?erreur=Un lien de réinitialisation est envoyé dans votre boite Email ");  
   
	}
     else
     {
          header("Location:motoublie.php?erreur=Le message n'a pu être envoyé veuillez reessayé");
     } 
}
}
else{
    header("location:motoublie.php");
}
?>