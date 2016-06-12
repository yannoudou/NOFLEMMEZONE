 <?php
session_start(); // On démarre la session AVANT toute chose
$bdd=new PDO( 'mysql:host=localhost;dbname=base', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  if(isset( $_GET['id']) AND $_GET['id'] > 0)
   {
                        $getid=intval($_GET['id']);
                          $profil= $bdd->prepare("SELECT * FROM membres WHERE id=?  AND profil= ?");
                          $profil->execute(array($getid,1));
                           $profilcomplet = $profil-> rowCount();
                              if($profilcomplet == 1)
                          {
                                          
                            header("Location: profilameliore.php?id=" .$_SESSION['id']);
                                        
                          }
                          else
                          {
                                  header("Location: page/page1.php?id=" .$_SESSION['id']);
                          }
    
 
        
}

?>