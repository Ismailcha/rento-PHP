<?php
session_start();
require_once("connexion_server/connexion.php");
if (isset($_POST['password']) and isset($_POST['cpassword']) )
{
		
	$email=$_SESSION['email'];
        $token=$_SESSION['token'];
	$password=$_POST['password'];
        $confirmer=$_POST['cpassword'];

        if($password!=$confirmer)
        {
            header("Location:newlogin.php?errur=Les mots de passe sont differents");
            
        }      
else{
    //crypté le password avant de l'inserer dans la base de D 
    $motpasse=password_hash($password,PASSWORD_DEFAULT);  
    $req = $pdo->prepare("UPDATE utilisateur SET mot_passe= :motpasse,token=Null WHERE email= :email and token=:token");
    $req->bindValue(':motpasse',$motpasse);
    $req->bindValue(':token',$token);
    $req->bindValue(':email',$email, PDO::PARAM_STR);
    $req->execute();
	//crypté le password avant de l'inserer dans la base de D 
 

$req->execute();

		if($req==false)
		{
            header("Location:newlogin.php?errur=Probleme de modification");
		
            
            exit(); 
		}
		else
		{
            header("Location:index.php");
		
		}
        }
    }
   else
		{
			header("Location:newlogin.php");
		}
