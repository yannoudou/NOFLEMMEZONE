<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=base', 'root', '');

if(isset($_SESSION['id'])) {
   $ruser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $ruser->execute(array($_SESSION['id']));
   $userdon = $ruser->fetch();
}
   
if(isset($_POST['emailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['message']))
	{
		
		 $nom = htmlspecialchars($_POST['nom']);
		$email = htmlspecialchars($_POST['email']);
		 $message = htmlspecialchars($_POST['message']);
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"PrimFX.com"<support@primfx.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';
		$message='
		<html>
			<body>
				<div align="center">
					<img src="http://www.primfx.com/mailing/banniere.png"/>
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
					<img src="http://www.primfx.com/mailing/separation.png"/>
				</div>
			</body>
		</html>
		';

		mail("yannicknoudou@gmail.com", "CONTACT - Monsite.com", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent etre completes !";
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
    if(isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {include ('navbar1.php');
}
else{include('navbar.php');}
  ?>


		<!-- fin nav-bar -->
		
		
		<!--debut corps-->
		<div class="container">
		  <!--debut celui de 9-->
		  <div class="col-lg-9"> 
			   <!--articles-->
		  
	 
		   <div class="row" style="background:white;margin-top:40px;padding-top:8px;padding-left: 10px;padding-bottom: 80px;">
			
			 
                    <div class="container"style="margin-bottom:20px;padding-left:40px;">
	<h2 style="padding-left:120px ;">Formulaire de Contact</h2>
	 <?php
    if(isset($msg)){
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
              background-color: #053C5C;"><br/>
		<font color="red" style="padding-left:100px;">' .$msg. "<br/></font>";
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
						  
  <form method="POST" action="" style="padding-left:120px ;">
			<div class="form-group">
     <label for="usr">Nom:</label>
     <input type="text" class="form-control" id="usr"placeholder="nom" name="nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>">
      </div>
			
	  
	  
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
    </div>
			<textarea name="message" rows="12" cols="35" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea> <br/> 
				
			<br/>
			<button  type="submit" name="emailform" class="btn btn-primary"style="border-radius:0;background:#053C5C;width:150px;margin-left:65px;">Envoyer</button>
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


<p><a href="pageinscription.php" style="padding-left:80px;">Pas de Compte? creez-en Un</a></p>
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