<?php
  $bdd=new PDO( 'mysql:host=localhost;dbname=base', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  if(isset( $_POST['envoyer']))
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
          $email = htmlspecialchars($_POST['email']);
          $pass = sha1($_POST['pass']);
           $pass1 = sha1($_POST['pass1']);
   
    if(!empty( $_POST['pseudo']) AND !empty( $_POST['email']) AND !empty( $_POST['pass']) AND !empty( $_POST['pass1']))
    {
       $requetepseudo= $bdd->prepare("SELECT*FROM membres WHERE pseudo=?");
		 $requetepseudo->execute(array($pseudo));
		 $pseudoexiste = $requetepseudo-> rowCount();
           if($pseudoexiste==0){
          $pseudolength = strlen($pseudo);
								if( $pseudolength <= 255)
								{
								  if(filter_var($email,FILTER_VALIDATE_EMAIL))
								  {
									 $requetemail= $bdd->prepare("SELECT*FROM membres WHERE email=?");
									 $requetemail->execute(array($email));
									 $emailexiste = $requetemail-> rowCount();
												 if ($emailexiste == 0){
															if($pass==$pass1){
															      $longueurkey=20;
																  $key="";
																  for ($i=1; $i <$longueurkey ; $i++) { 
																  	$key .= mt_rand(0,9);
																  }
																   $dateinscri=time();
																   $dateinscrip=date("d-m-Y",$dateinscri);
																	$insertvaleur =$bdd->prepare("INSERT INTO membres (pseudo,motdepasse,email,avatar,nom,prenom,adresse,confirmkey,confirme,naissance,loisir,taille,poids,dcouche,squat,profil,sex,ttaille,thanche,tcou,programme,bodyfat,dateinscription,derniereconnexion,programme) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
																	$insertvaleur-> execute(array($pseudo,$pass,$email,"avatar1.jpg","nom","Prenom","adresse",$key,0,"03.06.2016","vide",0,0,0,0,0,0,0,0,0,0,0,$dateinscrip,$dateinscrip,"Kein Eingabe"));
																																		$header="MIME-Version: 1.0\r\n";
																	$header.='From:"Noflemmezone.com"<support@primfx.com>'."\n";
																	$header.='Content-Type:text/html; charset="uft-8"'."\n";
																	$header.='Content-Transfer-Encoding: 8bit';
																	

																	$message='
																	<html>
																		<body>
																			<div align="center">

																				<a href="http://127.0.0.1/my-site/pageconfirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmation de Votre Compte</a>
																			</div>
																		</body>
																	</html>
																	';

																	mail($email, "Confirmation de Compte", $message, $header);



																	$erreur = "Votre Compte a bien ete creer";
																	header("Location:pageconnexionammeliorer.php");
																	  }
															 else{ $erreur="vos mot de passe doivent etre identiques";
																	  }
															  }else{
																	  $erreur="Adresse deja enregistres";
																	}
																 }
							  
														  else
														  {
															$erreur = "votre adresse email n est pas valide";
														  }
								}
								else{
								  $erreur="Votre Pseudo ne doit pas depasser 255 caracteres";
								}
   
   }
   else
   {
	$erreur="Pseudo deja existant";
	}
    }
    else{
        $erreur="Tous les champs doivent etre complete";
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
	<h2 style="padding-left:120px ;">Inscription</h2>
	<?php
    if(isset( $erreur)){
        echo '<HR style="margin-top: 0;
			  height: 2px;width:90px ;
    display: inline-block;
	margin-bottom: 0;
              background-color: #E25326;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 250px;
    display: inline-block;
	margin-bottom:0;
              background-color: #053C5C;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 410px;
    display: inline-block;
	margin-bottom:0;
              background-color: #E25326;"> <br/><font color="red" style="padding-left:130px;">' .$erreur. "</font>";
			  
    }
    ?>
	<br/>
  <HR style="margin-top: 0;
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
<form role="form" method="POST" action=""style="padding-left:120px ;">
	   
      <div class="form-group">
     <label for="usr">Pseudo:</label>
     <input type="text" class="form-control" id="usr"placeholder="Enter Pseudo" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;} ?>">
      </div>
	  
	  
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($email)){echo $email;} ?>">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass">
    </div>
	
    <div class="form-group">
      <label for="pwd1">Password:</label>
      <input type="password" class="form-control" id="pass1" placeholder="confirmer password"name="pass1">
    </div>
     
     <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
      </div>
    
    <button type="submit" name="envoyer" class="btn btn-primary" style="border-radius:0;background:#053C5C;width:150px;">s inscrire</button>
    
</form>

	<br/>
<HR style="margin-top: 0;
			  height: 2px;width: 250px;
    display: inline-block;
	margin-bottom: 0;
              background-color: #E25326;">
			  <HR style="margin-top: 0;
			  height: 2px;width:410px ;
    display: inline-block;
	margin-bottom:0;
              background-color: #053C5C;">
			  <HR style="margin-top: 0;
			  height: 2px;width: 90px;
    display: inline-block;
	margin-bottom:0;
              background-color: #E25326;">
</div>  
<p><a href=""style="padding-left:80px;">Deja un compte? connecter-vous</a></p>
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