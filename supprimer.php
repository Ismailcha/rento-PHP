<?php
require_once("connexion_server/connexion.php");
if(isset($_GET['code1']))
{
    $var=$_GET['code1'];
    $req1=$pdo->prepare('delete from immoubilier where id=:var');
    $req1->bindValue(':var',$var);
    $req1->execute();
    header("location:in1.php");
}elseif(isset($_GET['code2']))
{
    $var=$_GET['code2'];
    $req1=$pdo->prepare('delete from  materiaux where id=:var');
    $req1->bindValue(':var',$var);
    $req1->execute();
    header("location:in1.php");

}else
{
    $var=$_GET['code3'];
    $req1=$pdo->prepare('delete from  evenement where id=:var');
    $req1->bindValue(':var',$var);
    $req1->execute();
    header("location:in1.php");
}

?>