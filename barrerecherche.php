<?php
session_start(); // On démarre la session AVANT toute chose
$bdd=new PDO( 'mysql:host=localhost;dbname=base', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <link rel="stylesheet" type="text/css" href="final1.css"> 

<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>
</head>


<body>
	<?php include ('navbar.php'); ?>
	<form method="post" style="display:flex;">
 <div class="form-group">
  <label for="sel1">GENDER:</label>
  <select class="js-example-basic-single form-control" id="sel1">
    <option>male</option>
    <option>female</option>
     
  </select>
</div>
<div class="form-group">
  <label for="sel2">SES Ojectifs</label>
  <select class="js-example-basic-single form-control" id="sel2">
    <option>PRISE DE MASSE</option>
    <option>PERTE DE MASSE</option>
    <option>DEFINITION DU CORPS</option>
   
  </select>
</div>

<div class="form-group">
  <label for="sel3">Activites</label>
  <select class="js-example-basic-single form-control" id="sel3">
    <option>footbal</option>
    <option>basketball</option>
    <option>courir</option>
    <option>karate</option>
    <option>taekouendo</option>
    <option>6</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
   
  </select>
</div>
<div class="form-group">
  <label for="sel4">localisation</label>
  <select class="js-example-basic-single form-control" id="sel4">
    <option>ca doit venir de ma base de donne</option>
    <option>basketball</option>
    <option>courir</option>
    <option>karate</option>
    <option>taekouendo</option>
    
   
  </select>
</div>
<div class="form-group">
  <label for="sel5">Perimetre de:</label>
  <select class="js-example-basic-single form-control" id="sel5">
    <option>10km</option>
    <option>20km</option>
    <option>30km</option>
    <option>40km</option>
    <option>50km</option>
</select>
</div>
</form>
<form method="post">
<input type="submit" value="rechercher">
</form>

<?php include ('footer1.php'); ?>
</body>
</html>