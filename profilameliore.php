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
			
    

?>
 <!DOCTYPE html>
    <html>

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
<head>

</head>


<body>
 
<?php
			if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']){include ('navbar1.php');}
    else{include ('navbar.php');}
?>
    
    <div class="container" style="margin-top:30px;">
    	<div class="row"style="">
           <div class="col-lg-1"></div>
           <div class="col-lg-10" style ="background:white;padding-bottom:40px;">

       
       <h3 style="padding-top:10px;margin-left:10px"> PROFIL</h3>
       <a href="#" style="float:right;margin-top: -30px;">[Modifier infos/editer son Profil]</a>
       <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-3" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-3" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-6" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
                
               
             <div style="text-align:center;"> <?php 
                   if(!empty($userdon['avatar']))
                   {
                  ?>
                      <img heigtht="200" width="200" style="border:3px solid lightgrey;" src="membres/avatar/<?php echo $userdon['avatar'];?>" alt="" class="avatar img-circle" >
                      
                     <?php 
                         }
                       ?>
				<h3> <?php echo $userdon['prenom'];?>+<?php echo $userdon['nom'];?></h3><span><p style ="opacity:0.6;">Pays de la personne</p></span>
				
				<p> Status de la personne moderateur admin ou user</p>
				
              </div >
			 
		
        
           <HR>
        
        
        <div >
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" style="margin-top:20px;" href="#home">Informations </a></li>
    <li><a data-toggle="tab" style="margin-top:20px;" href="#menu1">Perfomance</a></li>
    <li><a data-toggle="tab"style="margin-top:20px;" href="#menu2">Statistiques</a></li>
    <li><a data-toggle="tab"style="margin-top:20px;" href="#menu3">Stats Calcul</a></li>
    <li><a data-toggle="tab"style="margin-top:20px;" href="#menu4">Vos Objectifs</a></li>
    <li><a data-toggle="tab"style="margin-top:20px;" href="#menu5">Programme et alimentation</a></li>
    <li><a data-toggle="tab"style="margin-top:20px;padding-bottom: 4px;padding-top: 5px;" href="#menu6"><i style="color:white;"class="fa fa-question fa-2x" aria-hidden="true"></i></a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
              <div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">  Informations generales <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
					</div>
    <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-1" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-4" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-7" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
              <h6>Pseudo:</h6>
                <h5 ><?php echo $userdon['pseudo'];?></h5><HR>
              <h6>Email:</h6> <h5  ><?php echo $userdon['email'];?></h5><HR>
              <h6>Nom:</h6> <h5 > <?php echo $userdon['nom'];?></h5><HR>
              <h6>Prenom:</h6>  <h5 > <?php echo $userdon['prenom'];?></h5><HR>

 			 <h6>Date de Naissance:</h6> 
 			 <h5><?php echo $userdon['naissance'];?></h5><HR>
             <h6>Loisirs:</h6> <h5 ><?php echo $userdon['loisir'];?></h5><HR>
   
 			 <h6>Adresse:</h6>
             <h5 ><?php echo $userdon['adresse'];?></h5><HR>

 			 <h6>Date d inscription:</h6> <h5 ><?php echo $userdon['dateinscription'];?></h5><hr>
 			  <h6> Date de la derniere connexion:</h6><h5 > <?php echo $userdon['derniereconnexion'];?> </h5>
 			</div>
                       <div class="col-xs-2"></div>
 			</div>
                      
 			
 				
  
  


			  
    </div>
    <div id="menu1" class="tab-pane fade">
      
<div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Donnes relatives a vos perfomances <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
					</div>
    <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-1" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-4" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-7" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
              <h6>Taille:</h6>
                <h5 ><?php echo $userdon['taille'];?></h5><HR>
              <h6>poids:</h6> <h5  ><?php echo $userdon['poids'];?></h5><HR>
              <h6>Tour de hanche:</h6> <h5 > <?php echo $userdon['ttaille'];?></h5><HR>
              <h6>Tour du cou:</h6>  <h5 ><?php echo $userdon['tcou'];?></h5><HR>
                
              </div>
						<div class="col-xs-2"></div>
			  
                       </div>
		
    </div>
           
    <div id="menu2" class="tab-pane fade">
      <div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Vos Statistiques <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
					</div>
    <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-1" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-4" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-7" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
                          <h6>Poids DC avec la barre:</h6> <h5 > <?php echo $userdon['dcouche'];?></h5><HR>
              <h6>Poids Squat:</h6>  <h5 ><?php echo $userdon['squat'];?></h5><HR>
                
              <h6>stats:</h6>
                <h5 >DOMAINE PAS ENCORE DISPO cm</h5><HR>
              <h6>stats:</h6> <h5  >DOMAINE PAS ENCORE DISPO</h5><HR>
              <h6>stats stats avec la barre:</h6> <h5 > DONNE PAS ENCORE DISPONIBLE</h5><HR>
              <h6>stats Squat:</h6>  <h5 >DONNE PAS ENCORE DISPONIBLE</h5><HR>

 			 
                      
 			
 				
  
  

</div>
						<div class="col-xs-2"></div>
			  
                       </div>
    </div>
    
    <div id="menu3" class="tab-pane fade">
      <div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Vos Indices,Bodyfat et Etc... <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
					</div>
    <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-1" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-4" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-7" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
              <h6>stats:</h6>
                <h5 >DONNE PAS ENCORE DISPONIBLE cm</h5><HR>
              <h6>bodyfat:</h6> <h5  ><?php echo $userdon['bodyfat'];?></h5><HR>
              <h6>Besoin en proteines journaliers:</h6> <h5 > DONNE PAS ENCORE DISPONIBLE</h5><HR>
              <h6>stats Squat:</h6>  <h5 >DONNE PAS ENCORE DISPONIBLE</h5><HR>

 			 
                      
 			
 				
  
  

</div>
						<div class="col-xs-2"></div>
			  
                       </div>
    </div>
    
    
    
    
    <div id="menu4" class="tab-pane fade">
      <div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Vos objectifs <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
					</div>
    <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-1" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-4" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-7" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
              <h6>objectifs:</h6>
                <h5 ><?php echo $userdon['programme'];?> cm</h5><HR>
              <h6>bodyfat-ideale:</h6> <h5  >DONNE PAS ENCORE DISPONIBLE</h5><HR>
              <h6>Besoin en proteines journaliers:</h6> <h5 > DONNE PAS ENCORE DISPONIBLE</h5><HR>
              <h6>stats Squat:</h6>  <h5 >DONNE PAS ENCORE DISPONIBLE</h5><HR>

 			 
                      
 			
 				
  
  

</div>
			  <div class="col-xs-2"></div>
                       </div>
	
    </div>
    <div id="menu5" class="tab-pane fade">
    <div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Vos objectifs <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
					</div>
    <!--debut ligne avec intervalle-->
       <div class="row">
        <div class="col-xs-1" style="padding-left: 15px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
       <div class="col-xs-4" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #053C5C;
    height: 2px;"></div>
       <div class="col-xs-7" style="padding-left: 2px;padding-right: 15px;"><HR style="margin-top: 0;
    border: 0;
    border-top: .0625rem solid rgba(0,0,0,.1);
    background: #E25326;
    height: 2px;"></div>
        
			   </div>
			 <!--fin ligne avec intervalle--> 
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
              <h6>objectifs:</h6>
                <h5 >000 cm</h5><HR>
              <h6>bodyfat-ideale:</h6> <h5  >000</h5><HR>
              <h6>Besoin en proteines journaliers:</h6> <h5 > 000</h5><HR>
              <h6>stats Squat:</h6>  <h5 >000</h5><HR>

 			 
                      
 			
 				
  
  

</div>
						<div class="col-xs-2"></div>
			  
                       </div>
    </div>
    <div id="menu6" class="tab-pane fade">
      <h3>Pourqoui ses Imformations</h3>

<h3>A quoi servirons t-ils</h3>



      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    
    
  </div>
</div>

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        	  




           </div>
           
           
           <div class="col-lg-1"></div>
    	</div>
      
    </div>
    
 <div style ="margin-top:40px;">  
    <?php
include ('footer1.php');?>

</div>
 

 
</body>
    </html>
 <?php   
}
     else
     {
     header('Location: Pageconnexionammeliorer.php');
     }
   }else{
    header('Location: Pageconnexionammeliorer.php');
}

?>