
<?php
ini_set('display_errors', 1); 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=base', 'root', '');

if(isset($_SESSION['id'])) {
   $ruser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $ruser->execute(array($_SESSION['id']));
   $userdon = $ruser->fetch();
   
 include ('Homepage1.php');
}
else{
  include ('Homepage2.php');
}
?>