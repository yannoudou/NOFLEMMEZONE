<?php
session_start(); // On démarre la session AVANT toute chose
$bdd=new PDO( 'mysql:host=localhost;dbname=base', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  if(isset( $_GET['id']) AND $_GET['id'] > 0)
   {
    $getid=intval($_GET['id']);
    $ruser = $bdd->prepare("SELECT*FROM membres WHERE id=?");
    $ruser->execute(array($getid));
    $userdon=$ruser -> fetch();
	 
     if(isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']){
     	header("Location: lien.php?id=" .$_SESSION['id']);
     }
     else
     {
     	header("Location:pageconnexionammeliorer.php");
     }
 }
 else{
 	header("Location:pageconnexionammeliorer.php");
 }
?>





