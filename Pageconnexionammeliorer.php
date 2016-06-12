<?php
session_start();
  $bdd=new PDO('mysql:host=localhost;dbname=base','root','');
  if(isset( $_POST['envoyercon'])){
							$emailcon = htmlspecialchars($_POST['emailcon']);
								  $passcon = sha1($_POST['passcon']);
								   if( !empty ($emailcon) AND !empty($passcon) AND !empty( $_POST['emailcon']) AND !empty( $_POST['passcon']))
									  {
													$ruser= $bdd->prepare("SELECT * FROM membres WHERE pseudo=? OR email=?  AND motdepasse= ?");
												   $ruser->execute(array($emailcon,$emailcon, $passcon));
												   $membreexiste = $ruser-> rowCount();
												   if($membreexiste == 1)
												   {
																			  $ruser1= $bdd->prepare("SELECT * FROM membres WHERE pseudo=? AND confirme= ? OR email=?   ");
																			 $ruser1->execute(array($emailcon, 1,$emailcon));
																			 $membreexiste1 = $ruser1-> rowCount();
																			 
																			  if ($membreexiste1 == 1) {
																			  	
																			  	  
													                                          
													                                          $userdon=$ruser1 -> fetch();
													                                        $_SESSION['id'] = $userdon['id'];
													                                        $_SESSION['pseudo'] = $userdon['pseudo'];
													                                        $_SESSION['email'] = $userdon['email'];
													                                        $derniereconnexio=time();
																                            $derniereconnexion=date("d-m-Y h:i:sa",$derniereconnexio);
																                            $insertderniereconnexion = $bdd->prepare("UPDATE membres SET derniereconnexion = ? WHERE id = ? ");
                                                                                 $insertderniereconnexion->execute(array($derniereconnexion, $_SESSION['id']));
													                                          header("Location: security.php?id=" .$_SESSION['id']);
													                                     

																			
																			  }
																			  else
																			  {
																				   $erreurcon = "votre Compte n a pas ete comfirmer veuillez verifier vos mails";
																			  } 
													
												   }
												   else
												   {
													$erreurcon = "Inexistant mail ou mot de passe";
												   }
									   
									  }
									  else
									  {
										$erreurcon="Vous devez remplir toutes les cases";
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
<script src="jspourtab.js"></script>
<link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet"/>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/flag-icon.css">
<link rel="stylesheet" type="text/css" href="CSS/flag/css/flag-icon.css">

<link rel="stylesheet" type="text/css" href="final1.css">
</head>
<body> 
<!-- debut nav-bar -->
 	
 <?php
   include ('navbar.php');?>


		<!-- fin nav-bar -->
		
		
		<!--debut corps-->
		<div class="container">
		  <!--debut celui de 9-->
		  <div class="col-lg-9"> 
			   <!--articles-->
		  
	 
		   <div class="row" style="background:white;margin-top:40px;padding-top:8px;padding-left: 10px;padding-bottom: 80px;">
			
			 
                    <div class="container"style="margin-bottom:20px;padding-left:40px;">
	<h2 style="padding-left:120px ;">Connexion</h2>
	 <?php
    if(isset( $erreurcon)){
        echo '
		 <HR style="margin-top: 0;
			  height: 2px;width: 90px;
    display: inline-block;
	margin-bottom: 0;
              background-color:#053C5C ;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 250px;
    display: inline-block;
	margin-bottom: 0;
              background-color:#E25326 ;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 410px;
    display: inline-block;
	margin-bottom: 0;
              background-color: #E25326;"><br/>
		<font color="red" style="padding-left:100px;">' .$erreurcon. "<br/></font>";
    }
    ?>
	
  <HR style="margin-top: 0em;
			  height: 2px;width: 250px;
    display: inline-block;
	margin-bottom: 0.7em;
              background-color: #E25326;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 90px;
    display: inline-block;
	margin-bottom: 0.7em;
              background-color: #053C5C;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 410px;
    display: inline-block;
	margin-bottom: 0.7em;
              background-color: #E25326;">
						  
  <form role="form"action="" method="post" style="padding-left:120px ;">
    <div class="form-group">
      <label for="pseudo">Email:</label>
      <input type=" text " class="form-control" id="email" placeholder="Pseudo" name="emailcon" >
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="passcon">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary" name="envoyercon" style="border-radius:0;background:#053C5C;width:150px;">se connecter</button>
  </form>
  <br/>
 
  <HR style="margin-top: 0;
			  height: 2px;width: 250px;
    display: inline-block;
	margin-bottom: 0;
              background-color: #E25326;">
			  
			  <HR style="margin-top: 0;
			  height: 2px;width: 410px;
    display: inline-block;
	margin-bottom: 0;
              background-color: #E25326;">
<HR style="margin-top: 0;
			  height: 2px;width: 90px;
    display: inline-block;
	margin-bottom: 0;
              background-color: #053C5C;">
						 
</div>  
<p><a href="formulaire_inscriptionameliorer.php" style="padding-left:80px;">Pas de Compte? creez-en Un</a></p>
		</div>
 <!--fin celui de 9-->
		  </div>
		 
			 
			
		
		 
		
		  
			<!--debut cote-->
		  <div class="col-lg-3" style="margin-top:40px;padding-right:0 !important;">
			<ul class="nav nav-pills nav-stacked">
		  
       <li class="active  "><a href="#"data-toggle="collapse" data-target="#demo"> <h5 id="h5exple"> <span> <button type="button" class="btn btn-danger btn10"> <span class="glyphicon glyphicon-folder-open" style=" color:#053C5C;"></span> </button> </span><span>  Entrainement</span></h5></a></li>
        <div id="demo" class="collapse">
		    <li><h6><a href="">Abdos</a></h6></li> <HR>
			<li><h6><a href="">Chest</a></h6></li><HR>   
			<li><h6><a href="">Back</a></h6></li><HR>   
			<li><h6><a href="">Mollet</a></h6> </li><HR>  
			<li><h6><a href="">Echios</a></h6> </li><HR>
			<li><h6><a href="">Back</a></h6></li>  <HR>
			<li><h6><a href="">Mollet</a></h6> </li> <HR>
			<li><h6><a href="">Echios</a> </h6></li>
		</div>
		</ul>
		 <br/>
			<ul class="nav nav-pills nav-stacked">
		  
       <li class="active  "><a href="#"data-toggle="collapse" data-target="#demo3"> <h5 id="h5exple"> <span> <button type="button" class="btn btn-danger btn10"> <span class="glyphicon glyphicon-folder-open" style=" color:#053C5C;"></span> </button> </span><span>  Entrainement</span></h5></a></li>
        <div id="demo3" class="collapse">
		    <li><h6><a href="">Abdos</a></h6></li> <HR>
			<li><h6><a href="">Chest</a></h6></li><HR>   
			<li><h6><a href="">Back</a></h6></li><HR>   
			<li><h6><a href="">Mollet</a></h6> </li><HR>  
			<li><h6><a href="">Echios</a></h6> </li><HR>
			<li><h6><a href="">Back</a></h6></li>  <HR>
			<li><h6><a href="">Mollet</a></h6> </li> <HR>
			<li><h6><a href="">Echios</a> </h6></li>
		</div>
		</ul>
		 <br/>
		<ul class="nav nav-pills nav-stacked">
		  
       <li class="active  "><a href="#"data-toggle="collapse" data-target="#demo4"> <h5 id="h5exple"> <span> <button type="button" class="btn btn-danger btn10"> <span class="glyphicon glyphicon-folder-open" style=" color:#053C5C;"></span> </button> </span><span>  Entrainement</span></h5></a></li>
        <div id="demo4" class="collapse">
		    <li><h6><a href="">Abdos</a></h6></li> <HR>
			<li><h6><a href="">Chest</a></h6></li><HR>   
			<li><h6><a href="">Back</a></h6></li><HR>   
			<li><h6><a href="">Mollet</a></h6> </li><HR>  
			<li><h6><a href="">Echios</a></h6> </li><HR>
			<li><h6><a href="">Back</a></h6></li>  <HR>
			<li><h6><a href="">Mollet</a></h6> </li> <HR>
			<li><h6><a href="">Echios</a> </h6></li>
		</div>
		</ul>
		 <br/>
			 <ul class="nav nav-pills nav-stacked">
        <li class="active  "><a href="#"data-toggle="collapse" data-target="#demo1"> <h5 id="h5exple"> <span> <button type="button" class="btn btn-danger btn10"> <span class="glyphicon glyphicon-folder-open" style=" color:#053C5C;"></span> </button> </span><span>  Alimentation</span></h5></a></li>
        <div id="demo1" class="collapse">
			<li><a href="">Prise de Masse</a></li><HR>
			<li><a href="">Prise de masse seche</a></li>  <HR>
			<li><a href="">Abdos visible</a></li>  <HR>
			<li><a href="">Entretien</a> </li> <HR>
			<li><a href="">Repos</a> </li>
		</div>
			 </ul>
			 <br/>
			  <ul class="nav nav-pills nav-stacked">
        <li class="active  "><a href="#"data-toggle="collapse" data-target="#demo2"> <h5 id="h5exple"> <span> <button type="button" class="btn btn-danger btn10"> <span class="glyphicon glyphicon-folder-open" style="color:#053C5C;"></span> </button> </span><span>  Complements</span></h5></a></li>
        <div id="demo2" class="collapse">
			<li><a href="">Whey-Protein</a></li><HR>
			<li><a href="">creatine</a></li>  <HR>
			<li><a href="">bcaa</a></li>  <HR>
			<li><a href="">Glutamine</a> </li> <HR>
			<li><a href="">Acide Aminees</a> </li>
		</div>
			 </ul>
			 
		  
		  </div>
		  
		   <!--fin cote-->
		  
		 </div>
		
		 <!--fin corps-->
		
        <!-- debut footer -->
	<div style="margin-top:30px;">	
 <?php
   include ('footer1.php');?>
 </div> 
			<!-- fin footer -->
        
        </body>
</html>