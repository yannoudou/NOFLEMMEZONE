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
       if(isset( $_POST['envoyesex'])){
                                  
                                   
                                       $insertsex = $bdd->prepare("UPDATE membres SET profil =? WHERE id = ?");
                                                       $insertsex->execute(array(1, $_SESSION['id']));
                                                       header('Location:../profilameliore.php?id='.$_SESSION['id']);
                                                     }
      ?>
<!DOCTYPE html>
    <html>
<head>
<title> HY-No FlemMe zOnE</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="jspourtab.js"></script>
<link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet"/>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/flag-icon.css">
<link rel="stylesheet" type="text/css" href="CSS/flag/css/flag-icon.css">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="final1.css">
<style type="text/css">

 .yx{margin:0; padding: 0;}
#abc{
  display: inline-block; width:100%;background:white;padding:10px;margin: 0;
  text-align: center; border: 0.5px solid lightgrey;color:white;}

#abc1{
  display: inline-block; width:100%;background:grey;padding:10px;margin: 0;
  text-align: center; border: 0.5px solid lightgrey;color:white;
}
.elone1{margin-left: 40px; border-radius: 0;background: #E25326;
padding-left: 20px ; padding-right: 20px;margin-top: 15px;margin-bottom: 15px;
color: white;
}
.elone2{margin-right: 40px; border-radius: 0;background: #E25326;
padding-left: 20px ; padding-right: 20px;margin-top: 15px;margin-bottom: 15px;
color: white;
}
.elone2:hover{
  background: #053C5C;color: white;
}
.elone1:hover{
  background: #053C5C;color: white;
}
body{font-family: 'Source Sans Pro', sans-serif;}
</style>

</head>
<body>
    <!-- debut nav-bar -->
 	
  <?php
      if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']){include ('navbar1.php');}
    else{include ('navbar.php');}
?>


		<!-- fin nav-bar -->
    
     <div class="container">
     <div class="row">

     <div class="col-xs-2"></div>
     <div class="col-xs-8" >
      <div class="row" style="margin-top:40px;">
    <div class="col-xs-2 yx "><a id="abc1"  href="#">1</a></div>
    <div class="col-xs-2 yx"><a id="abc1" href="#">2</a></div>
    <div class="col-xs-2 yx"><a id="abc1"  href="#">3</a></div>
    <div class="col-xs-2 yx"><a id="abc1" href="#">4</a></div>
    <div class="col-xs-2 yx"><a id="abc1"  href="#">5</a></div>
    <div class="col-xs-2 yx"><a id="abc1"  href="#">6</a></div>
    
    
  </div>
  
  
  
  <div class="row" style="border:1px solid lightgrey; background:white;margin-top:20px;margin-bottom:250px;">  
  <div style="border-bottom:0.0625rem solid rgba(39, 33, 33, 0.1);"><p align="right" style="margin-bottom:0;margin-right:20px;"> &#169; NoFlemmeZone.com</p></div>
  <form method="post">
 <div  style="text-align:center;"> 
   <h2 style="margin-top:20px;margin-bottom:40px;color:#E25326; ">FIN ET PROFIL</h2>
   <h4 style="opacity:0.7;margin-bottom:20px;">TOUS Vos Infoormations vous pouvriez les rertrouver sur votre Profil et ainsi donc les modifies avant par ce faite de pouvoir ainsi voir votre evolution a partir d un GRAPH et ainsi ein fonction de sexercices choisir des ajouts monalier vous pouriez ainsi votre evolution dans ses exercice! </h4>

   <h4  style="opacity:0.7;margin-bottom:20px;">  nous vous Preconisons de ce fait un <strong>PROGRAMME DE PRISE DE MASSE</strong></h4>
   <h4  style="opacity:0.7;margin-bottom:20px;">Apres calcul votre Besoin journalier calorifiques est autour de :</h4>
   <h3 style="opacity:0.7;margin-bottom:20px;"> <strong> 5000kcal</strong></h3>

 </div>
  <p>* en clin sur Fin vous serrez rediriger vers votre profil!</p>
    <div style="border-top:0.0625rem solid rgba(39, 33, 33, 0.1);box-shadow:0px 0px 30px 0px lightgrey inset;">
     <button type="" class="btn btn-default elone1"><a href="page5.php?id=<?php echo urlencode($_SESSION['id']);?>" >Retour</button></a>
<input style="float:right;" type="submit" name="envoyesex" class="btn btn-default elone2" value="FIN" /> </div>
 </div>
</form>



     </div>
     <div class="col-xs-2"></div>

     </div>
     </div> 

  


   
   <!-- debut footer -->
	<div style="margin-top:30px;">	
 <?php
   include ('footer1.php');?>
 </div> 
			<!-- fin footer -->
    
    
    
</body>
    </html>
    <?php
  }
     else
     {
      header("Location:../pageconnexionammeliorer.php");
     }
 }
 else{
  header("Location:../pageconnexionammeliorer.php");
 }
?>