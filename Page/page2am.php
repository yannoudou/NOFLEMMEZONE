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
														       if(isset($_POST['radio']) AND !empty($_POST['radio'])){
																		$sex=$_POST['radio'];
																			 $insertsex = $bdd->prepare("UPDATE membres SET sex = ? WHERE id = ?");
														                           $insertsex->execute(array($sex, $_SESSION['id']));
														                           
														                           	header('Location: page3.php?id='.$_SESSION['id']);
																		}
																		else
																		{
																			$erreur=" vous devez cochez une case";
																		}


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
<script src="javascript.js"></script>
<link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet"/>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/flag-icon.css">
<link rel="stylesheet" type="text/css" href="CSS/flag/css/flag-icon.css">

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

/*text-over*/
body {
	font-family:arial;	
}

.item1 {
	width:220px;
	height:220px;	
	border:4px solid #222;	
	margin:5px 5px 5px 0;
	
	/* required to hide the image after resized */
	overflow:hidden;
	
	/* for child absolute position */
	position:relative;
	
	/* display div in line */
	float: right;
}
.item2 {
	width:220px;
	height:220px;	
	border:4px solid #222;	
	margin:5px 5px 5px 0;
	
	/* required to hide the image after resized */
	overflow:hidden;
	
	/* for child absolute position */
	position:relative;
	
	/* display div in line */
	float: left;
}

.item .caption {
	width:220px;
	height:220px;
	background:#000;
	color:#fff;
	font-weight:bold;
		
	/* fix it at the bottom */
	position:absolute;
	left:0;
    padding:5px;

	/* hide it by default */
	display:none;

	/* opacity setting */
	filter:alpha(opacity=80);    /* ie  */
	-moz-opacity:0.8;    /* old mozilla browser like netscape  */
	-khtml-opacity: 0.8;    /* for really really old safari */  
	opacity: 0.8;    /* css standard, currently it works in most modern browsers like firefox,  */

}

.item .caption a {
	text-decoration:none;
	color:#F1F1F1;
	font-size:16px;	
	
	/* add spacing and make the whole row clickable*/
	
	display:block;
}



img {
	border:0;
	
	/* allow javascript moves the img position*/
	position:absolute;
}

.clear {
	clear:both;	
}
/*fin text*/
/*debut Flex woheckboxrking like radio*/
  input[type="radio"] {
    -webkit-appearance: checkbox;
    -moz-appearance: checkbox;
    }
/*debut Flex woheckboxrking like radio*/

/* debut button gauche et droite*/
.elone1{margin-left: 60px; border-radius: 0;background: #E25326;
padding-left: 20px ; padding-right: 30px;margin-top: 15px;margin-bottom: 15px;
color: white;
}
.elone2{margin-right: 60px; border-radius: 0;background: #E25326;
padding-left: 20px ; padding-right: 30px;margin-top: 15px;margin-bottom: 15px;
color: white;
}
.elone2:hover{
  background: #053C5C;color: white;
}
.elone1:hover{
  background: #053C5C;color: white;
}
/* fin button gauche et droite*/
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
    <div class="col-xs-2 yx"><a id="abc"  href="#">3</a></div>
    <div class="col-xs-2 yx"><a id="abc" href="#">4</a></div>
    <div class="col-xs-2 yx"><a id="abc"  href="#">5</a></div>
    <div class="col-xs-2 yx"><a id="abc"  href="#">6</a></div>
    
    
    
  </div>
  
  <?php  
  if (isset($erreur)) {
     	echo $erreur ; 
     }  

  ?>
  
  <div class="row" style="border:1px solid lightgrey; background:white;margin-top:20px;margin-bottom:250px;">  
  <div style="border-bottom:0.0625rem solid rgba(39, 33, 33, 0.1);"><p align="right" style="margin-bottom:0;margin-right:20px;">&#169;Welcome on NoFlemmeZone.com</p></div>
  
 <div  class="row" style="">
<div style="">
<h2 style="margin-top:20px;margin-bottom:10px;color:#E25326;text-align: center; ">SEXE</h2>
<div class="col-xs-2"></div>
<div class="col-xs-8">
	<form  method="post">
  <div class="item item1">
	<img src="woman.jpg" alt="title" title="" width="220" height="220"/>
    
	<div class="caption">
         
		<input class="radio" type="radio" name="radio" value="male" style="height: 220px;width: 220px;margin-left: -5px; margin-top:-5px;"/> 
	       
	</div>
</div>
  <div class="item item2">
	<img src="bild.jpg" alt="title" title="" width="220" height="220"/>
	<div class="caption">
         
		<input class="radio" type="radio" name="radio" value="female" style="height: 220px;width: 220px;margin-left: -5px; margin-top:-5px;"/>
        
	</div>
</div></div>
  <div class="col-xs-2"></div>
</div>
 </div> 

    <div  method="post" style="border-top:0.0625rem solid rgba(39, 33, 33, 0.1);box-shadow:0px 0px 30px 0px lightgrey inset;margin-top: 20px;">
     <button type="" class="btn btn-default elone1"><a href="page1.php?id=<?php echo urlencode($_SESSION['id']);?>" >Retour</button></a>
    
<input style="float:right;" type="submit" name="envoyesex" class="btn btn-default elone2" value="Suivant" />
  </div>
</form>
 </div>




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