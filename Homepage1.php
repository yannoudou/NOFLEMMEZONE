

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
	
		 <!--debut de la navbar-->
   
   <?php
    if(isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {include ('navbar1.php');
}
else{
  include ('navbar.php');
}
?>


    
    
    <!--Fin de la Barre de Navigation-->
        
        <!-- debut slider -->
		
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="bild1.jpg" alt="Chania" width="" height="345">
        <div class=" card card-block carousel-caption" >
          <h3 class="card-title">Special title treatment</h3>
  				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  					<a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="item">
        <img src="bild.jpg" alt="Chania" width="" height="345">
        <div class=" card card-block carousel-caption" >
          <h3 class="card-title">Special title treatment</h3>
  				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  					<a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    
      <div class="item">
        <img src="choice.jpg" alt="Flower" width="" height="345px">
        <div class=" card card-block carousel-caption" >
          <h3 class="card-title">Special title treatment</h3>
  				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  					<a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="item">
        <img src="way.jpg" alt="Flower" width="" height="345">
        <div class=" card card-block carousel-caption" >
          <h3 class="card-title">Special title treatment</h3>
  				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  					<a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class=" gauche left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <i class="fa fa-angle-double-left fa-3x" aria-hidden="true"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="droite right carousel-control" href="#myCarousel" role="button" data-slide="next">
     <i class="fa fa-angle-double-right fa-3x" aria-hidden="true"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
			<!-- fin slider -->
			
			<!-- debut punchline container -->

<div class="container " style=" background-color:#053C5C; margin-top:10px;box-shadow: 0 0 20px rgba(0,0,0,0.8);">
	<div class="row punchline-container" >
		<div class="col-md-4"></div>
		<div class="col-md-4" style="background-color: #F4791F;color:white;"
			<h4 class="text-center text-justify"> "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore"</h4>
			<p class="text-right"><small class="text-muted"> Lorem Ipsum </small></p>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
			<!-- fin punchline container -->
			
			<!-- debut video container -->
			
<div class="container video-container" style="text-align:center;padding-top:50px;background-color:white;
padding-bottom:50px;">
        <iframe width="800" height="450" src="https://www.youtube.com/embed/D7yZdDrgCjY" frameborder="0" allowfullscreen></iframe>
</div>			

			<!-- fin video container -->
			
			<!-- debut images -->

<div class="container" style="background-color: #053C5C">
	<div class="row image-container">
		<div class="col-md-4">
			<div class="card card1">
    			<img class="card-img-top img-responsive" src="q3.jpg" alt="Card image cap">
    				<div class="card-block card-block1">
      					<h4 class="card-title"> Focus </h4>
 		      		</div>
    		</div>
		</div>
		<div class="col-md-4">
			<div class="card card2">
    			<img class="card-img-top img-responsive" src="bild1.jpg" alt="Card image cap">
    				<div class="card-block card-block2">
      					<h4 class="card-title"> Hard Work </h4>
      				</div>
    		</div>
		</div>
		<div class="col-md-4">
			<div class="card card3">
    			<img class="card-img-top img-responsive"   src="bild.jpg" alt="Card image cap"  >
    				<div class="card-block card-block3">
      					<h4 class="card-title"> Dedications </h4>
      				</div>
    		</div>
		</div>
	</div>
</div>

         		

			<!-- fin images -->
             <!--debut footer-->
   
   <?php
   include ('footer1.php');?>  
    
  
	<!-- fin footer -->
			
			
			

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/holder/2.9.0/holder.min.js"></script>
</body>
</html>
