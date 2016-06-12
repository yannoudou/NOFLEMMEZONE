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
																  
																	$insertvaleur =$bdd->prepare("INSERT INTO membres (pseudo,motdepasse,email,avatar,nom,prenom,adresse,confirmkey,confirme) VALUES (?,?,?,?,?,?,?,?,?)");
																	$insertvaleur-> execute(array($pseudo,$pass,$email,"avatar1.jpg","nom","Prenom","adresse",$key,0));
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

<link rel="stylesheet" type="text/css" href="final.css">
</head>
<body> 
<!-- debut nav-bar -->
 	
 <?php
   include ('navbar.php');?>

		<!-- fin nav-bar -->
		 
		<!--debut corps-->
		<div class="container">
		  <!--debut celui de 9-->
		  <div class="col-lg-7"> 
  
		 
			 <div class="row" style="background:white;margin-top:20px;padding-top:8px;padding-left: 10px;padding-bottom: 8px;">
			
			 
                    <div class="container" style="margin-bottom:20px;padding-left:40px;">
	<h2>Inscription</h2>
 <a href="">Deja un compte? connecter-vous</a><br /><br />
  
<form role="form" method="POST" action="">
	   
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
    
    <button type="submit" name="envoyer" class="btn btn-primary">Submit</button>
    
</form>

	<?php
    if(isset( $erreur)){
        echo '<font color="red">' .$erreur. "</font>";
    }
    ?>
</div>  

		</div>
 <!--fin celui de 9-->
		  </div>
		
		  
			<!--debut cote-->
		  <div class="col-lg-5" style="margin-top:20px;padding-right:0 !important;">
			<img src="bon.jpg" height="300" width="450">
		  </div>
		
		  
		   <!--fin cote-->
		  
		 </div>
		
		 <!--fin corps-->
		 
		
		 
        <!-- debut footer -->
	 	
   <?php
   include ('footer1.php');?>
 
			<!-- fin footer -->
        
        </body>
	</html>