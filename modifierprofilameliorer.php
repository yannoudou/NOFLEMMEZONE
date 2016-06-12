<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=base', 'root', '');

if(isset($_SESSION['id'])) {
   
    $ruser = $bdd->prepare("SELECT*FROM membres WHERE id=?");
    $ruser->execute(array($_SESSION['id']));
    $userdon=$ruser -> fetch();
  
                            if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userdon['pseudo'])
                            {
                                $newpseudo = htmlspecialchars($_POST['newpseudo']);
                                $requetenewpseudo= $bdd->prepare("SELECT*FROM membres WHERE pseudo=?");
                                     $requetenewpseudo->execute(array($newpseudo));
                                     $newpseudoexiste = $requetenewpseudo-> rowCount();
                                                            if($newpseudoexiste==0){
                                                     
                                                      
                                                       $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
                                                       $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
                                                       header('Location: profilameliore.php?id='.$_SESSION['id']);
                                                            }else{$msg="Pseudo deja existant choississer un autre";}
                            }
                               
                                          
                                           
                                                        
                              if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $userdon['email'])
                              {
                                 $newemail = htmlspecialchars($_POST['newemail']);
                                 $requetenewemail= $bdd->prepare("SELECT*FROM membres WHERE email=?");
                                 $requetenewemail->execute(array($newemail));
                                 $newemailexiste = $requetenewemail-> rowCount();
                                      if(filter_var($newemail,FILTER_VALIDATE_EMAIL)) 
                                       {
                                           if($newemailexiste==0){
                                                   $insertmail = $bdd->prepare("UPDATE membres SET email = ? WHERE id = ?");
                                                    $insertmail->execute(array($newemail, $_SESSION['id']));
                                                    header('Location: profilameliore.php?id='.$_SESSION['id']);
                                            }else{$msg="Email deja utilise sur un compte existant";}
                                       }else{ $msg="Format email pas bon.";}
                                  }
                                                         
                                                          
                                                                        if(isset($_POST['newpass']) AND !empty($_POST['newpass']) AND isset($_POST['newpass1']) AND !empty($_POST['newpass1'])) {
                                                                           $pass = sha1($_POST['newpass']);
                                                                           $pass1 = sha1($_POST['newpass1']);
                                                                                                        if($pass == $pass1) {
                                                                                                          $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
                                                                                                          $insertmdp->execute(array($pass, $_SESSION['id']));
                                                                                                          header('Location: profilameliore.php?id='.$_SESSION['id']);
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                          $msg = "les mot de passe ne correspondent pas !";
                                                                                                       }
                                                       
                                                                        }
                        
                        
                        
                        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']) )
                        {
                        $tailleMax = 2097152;
                        $extensionsValides=array('jpg','gif','jpeg','png');
                                                        if($_FILES['avatar']['size']<= $tailleMax)
                                                        {
                                                                                    $extensionUpload=strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                                                                                  if (in_array($extensionUpload, $extensionsValides)) 
                                                                                  {
                                                                                    $chemin="membres/avatar/".$_SESSION['id'].".".$extensionUpload;
                                                                                    
                                                        
                                                                                   
                                                        
                                                                                    $resultat= move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                                                                                                                if ($resultat) {
                                                                                                                 $updateavatar= $bdd->prepare('UPDATE membres SET avatar= :avatar WHERE id= :id');
                                                                                                                 $updateavatar->execute(array(
                                                                                                                 'avatar'=> $_SESSION['id'].".".$extensionUpload,
                                                                                                                'id'=> $_SESSION['id']
                                                                                                                  ));
                                                                                                                 header('Location: profilameliore.php?id='.$_SESSION['id']);
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                  $msg="erreur foto";
                                                                                                                }
                                                                                    
                                                        
                                                        
                                                        
                                                                                  }
                                                                                  else
                                                                                  {
                                                                                    $msg="votre photo de profil doit o format jpeg,jpg,gif,png";
                                                                                  }
                                                        }
                                                        else{
                                                            $msg="votre fote de profil ne doit pas depasser 2Mo";
                                                        }
                       
                        }
                      
                        
                        
                        
                        
  if(!empty( $_POST['nom']) )
              {           $nom = htmlspecialchars($_POST['nom']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
                           $insertnom->execute(array($nom, $_SESSION['id']));
                 }
                 if( !empty( $_POST['prenom']) )
              {            $prenom = htmlspecialchars($_POST['prenom']);        
                        $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
                           $insertprenom->execute(array($prenom, $_SESSION['id']));
                 }


                 if(!empty( $_POST['naissance']) )
              {           $nom = htmlspecialchars($_POST['naissance']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET naissance = ? WHERE id = ?");
                           $insertnom->execute(array($naissance, $_SESSION['id']));
                 }

                 if(!empty( $_POST['loisir']) )
              {           $nom = htmlspecialchars($_POST['loisir']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET loisir = ? WHERE id = ?");
                           $insertnom->execute(array($loisir, $_SESSION['id']));
                 }

                 if(!empty( $_POST['taille']) )
              {           $nom = htmlspecialchars($_POST['taille']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET taille = ? WHERE id = ?");
                           $insertnom->execute(array($taille, $_SESSION['id']));
                 }

                 if(!empty( $_POST['poids']) )
              {           $nom = htmlspecialchars($_POST['poids']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET poids = ? WHERE id = ?");
                           $insertnom->execute(array($poids, $_SESSION['id']));
                 }
                 if(!empty( $_POST['dcouche']) )
              {           $nom = htmlspecialchars($_POST['dcouche']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET dcouche = ? WHERE id = ?");
                           $insertnom->execute(array($dcouche, $_SESSION['id']));
                 }

                 if(!empty( $_POST['squat']) )
              {           $nom = htmlspecialchars($_POST['squat']);
                       
                               
                        $insertnom = $bdd->prepare("UPDATE membres SET squat = ? WHERE id = ?");
                           $insertnom->execute(array($squat, $_SESSION['id']));
                 }







                 if( !empty( $_POST['adresse']))
              {                   $adresse = htmlspecialchars($_POST['adresse']);  
                         $insertadresse = $bdd->prepare("UPDATE membres SET adresse = ? WHERE id = ?");
                           $insertadresse->execute(array($adresse, $_SESSION['id']));
                         header('Location: profilameliore.php?id='.$_SESSION['id']);
                 }
    
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
                
               
             <div style="text-align:center;">
             <?php 
                   if(!empty($userdon['avatar']))
                   {
                  ?>
                      <img heigtht="200" width="200" style="border:3px solid lightgrey;" src="membres/avatar/<?php echo $userdon['avatar'];?>" alt="" class="avatar img-circle" >
                      
                     <?php 
                         }
                       ?>
                        <form  role="form" method="POST" action="" enctype="multipart/form-data">
    <div align="center"><div   class="form-group" style="margin-top:10px;">
     
     <input type="file"  id="" name="avatar" >
      </div> </div>
      <BR>
     <div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>
    </form>
				
				
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
       <div class="col-xs-5" style="padding-left: 3px;padding-right: 2px;"><HR style="margin-top: 0;
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
					   <div class="row" >
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8 manioc">
						 
						 <form role="form" method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
     <label for="usr">New Pseudo:</label>
     <input type="text" class="form-control" id="usr"placeholder="Entre Nouveau Pseudo" name="newpseudo" value="<?php echo $userdon['pseudo']; ?>">
      </div>
    
     
    <div class="form-group">
      <label for="email"> New Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Entre nouvelle  email" name="newemail" value="<?php echo $userdon['email']; ?>">
    </div>
        
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="newpass">
    </div>
     
  
    <div class="form-group">
      <label for="pwd1">REcris New Password:</label>
      <input type="password" class="form-control" id="pass1" placeholder="confirmer password"name="newpass1">
    </div>
     
        <div class="form-group">
     <label for="usr">Nom:</label>
     <input type="text" class="form-control" id="usr"placeholder="Votre Nom" name="nom" value="<?php if(isset($nom)){echo $nom;} ?>">
      </div>
       
                    <div class="form-group">
     <label for="usr">preNom:</label>
     <input type="text" class="form-control" id="usr"placeholder="Votre preNom" name="prenom" value="<?php if(isset($prenom)){echo $prenom;} ?>">
      </div>
       
        <div class="form-group">
     <label for="usr">Date de naissance:</label>
     <input type="date" class="form-control" id="usr"placeholder="Date de Naissance" name="naissance" value="<?php if(isset($naissance)){echo $naissance;} ?>">
      </div>
       
     <div class="form-group">
     <label for="usr">Adresse:</label>
     <input type="text" class="form-control" id="adresse" placeholder="Votre Adresse" rows="8" cols="10"name="adresse" value="<?php if(isset($adresse)){echo $adresse;} ?>">
      </div>  
       
      <div class="form-group">
     <label for="usr">Loisirs:</label>
     <input type="text" class="form-control" id="adresse" placeholder="Vos Loisir" rows="8" cols="10"name="loisir" value="<?php if(isset($loisir)){echo $loisir;} ?>">
      </div>
	  
	  <div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>
	  
      </form>
						 
						</div>
                       <div class="col-xs-2"></div>
 			      </div>
                       </div>
  
  <!--debut--> 
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
						
						 <form role="form" method="POST" action="" enctype="multipart/form-data"> 
                <div class="form-group">
     <label for="usr">Taille en Cm</label>
     <input type="number"  min="1" max="500" class="form-control" id="usr"placeholder="Cm" name="taille" value="<?php if(isset($taille)){echo $taille;} ?>">
      </div> 
      <div class="form-group">
     <label for="usr">Poids en KG</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Poids" name="poids" value="<?php if(isset($poids)){echo $poids;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max devellope couche:</label>
     <input type="number" class="form-control" id="usr"placeholder="votre Max" name="dcouche" value="<?php if(isset($dcouche)){echo $dcouche;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max au squat:</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Max squat" name="squat" value="<?php if(isset($squat)){echo $squat;} ?>">
      </div>
					<div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>	 
						 
						 </form></div>
                         
                         <div class="col-xs-2"></div>
						
			  
                       </div>
		
    </div>
   <!--fin-->
    <!--debut--> 
    <div id="menu2" class="tab-pane fade">
      
<div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Donnes relatives a vos statistiques <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
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
						 
						 
       <form role="form" method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
     <label for="usr">New Pseudo:</label>
     <input type="text" class="form-control" id="usr"placeholder="Entre Nouveau Pseudo" name="newpseudo" value="<?php echo $userdon['pseudo']; ?>">
      </div>
    
     
    <div class="form-group">
      <label for="email"> New Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Entre nouvelle  email" name="newemail" value="<?php echo $userdon['email']; ?>">
    </div>
        
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="newpass">
    </div>
     
  
    <div class="form-group">
      <label for="pwd1">REcris New Password:</label>
      <input type="password" class="form-control" id="pass1" placeholder="confirmer password"name="newpass1">
    </div>
     
        <div class="form-group">
     <label for="usr">Nom:</label>
     <input type="text" class="form-control" id="usr"placeholder="Votre Nom" name="nom" value="<?php if(isset($nom)){echo $nom;} ?>">
      </div>
       
                    <div class="form-group">
     <label for="usr">preNom:</label>
     <input type="text" class="form-control" id="usr"placeholder="Votre preNom" name="prenom" value="<?php if(isset($prenom)){echo $prenom;} ?>">
      </div>
       
        <div class="form-group">
     <label for="usr">Date de naissance:</label>
     <input type="datetime" class="form-control" id="usr"placeholder="Date de Naissance" name="naissance" value="<?php if(isset($naissance)){echo $naissance;} ?>">
      </div>
       
     <div class="form-group">
     <label for="usr">Adresse:</label>
     <input type="text" class="form-control" id="adresse" placeholder="Votre Adresse" rows="8" cols="10"name="adresse" value="<?php if(isset($adresse)){echo $adresse;} ?>">
      </div>  
       
      <div class="form-group">
     <label for="usr">Loisirs:</label>
     <input type="text" class="form-control" id="adresse" placeholder="Vos Loisir" rows="8" cols="10"name="loisir" value="<?php if(isset($loisir)){echo $loisir;} ?>">
      </div>
	  
	  <div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>
	  
      </form>
						 
						 
						 
						</div>
						<div class="col-xs-2"></div>
			  
                       </div>
		
    </div>
   <!--fin-->
    <!--debut--> 
    <div id="menu3" class="tab-pane fade">
      
<div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Calcul statistiques <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
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
						 
						 
						 <form role="form" method="POST" action="" enctype="multipart/form-data"> 
                <div class="form-group">
     <label for="usr">Taille en Cm</label>
     <input type="number"  min="1" max="500" class="form-control" id="usr"placeholder="Cm" name="taille" value="<?php if(isset($taille)){echo $taille;} ?>">
      </div> 
      <div class="form-group">
     <label for="usr">Poids en KG</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Poids" name="poids" value="<?php if(isset($poids)){echo $poids;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max devellope couche:</label>
     <input type="number" class="form-control" id="usr"placeholder="votre Max" name="dcouche" value="<?php if(isset($dcouche)){echo $dcouche;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max au squat:</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Max squat" name="squat" value="<?php if(isset($squat)){echo $squat;} ?>">
      </div>
					<div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>	 
						 
						 </form>
						 
						 
						</div>
						<div class="col-xs-2"></div>
			  
                       </div>
		
    </div>
   <!--fin-->
    <!--debut--> 
    <div id="menu4" class="tab-pane fade">
      
<div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Nos Objectifs a atteindre <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
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
						 
						 
						 
						 		 <form role="form" method="POST" action="" enctype="multipart/form-data"> 
                <div class="form-group">
     <label for="usr">Taille en Cm</label>
     <input type="number"  min="1" max="500" class="form-control" id="usr"placeholder="Cm" name="taille" value="<?php if(isset($taille)){echo $taille;} ?>">
      </div> 
      <div class="form-group">
     <label for="usr">Poids en KG</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Poids" name="poids" value="<?php if(isset($poids)){echo $poids;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max devellope couche:</label>
     <input type="number" class="form-control" id="usr"placeholder="votre Max" name="dcouche" value="<?php if(isset($dcouche)){echo $dcouche;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max au squat:</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Max squat" name="squat" value="<?php if(isset($squat)){echo $squat;} ?>">
      </div>
	  <div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>
								 
								 
								 
								 </form>
					
						 
						 
						 
						</div>
						<div class="col-xs-2"></div>
			  
                       </div>
		
    </div>
   <!--fin-->
    <!--debut--> 
    <div id="menu5" class="tab-pane fade">
      
<div style="margin-left:100px;" class="entry-content">
			   <h4 style="width:100%;margin-top:10px;"">Programme et entrainement <a href="modifierprofilameliorer.php" id="" style="text-decoration:none;"><span style="float:right;color: #053C5C;" class="glyphicon glyphicon-pencil"></a></span></h4>
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
						 
						 
						 		 <form role="form" method="POST" action="" enctype="multipart/form-data"> 
                <div class="form-group">
     <label for="usr">Taille en Cm</label>
     <input type="number"  min="1" max="500" class="form-control" id="usr"placeholder="Cm" name="taille" value="<?php if(isset($taille)){echo $taille;} ?>">
      </div> 
      <div class="form-group">
     <label for="usr">Poids en KG</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Poids" name="poids" value="<?php if(isset($poids)){echo $poids;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max devellope couche:</label>
     <input type="number" class="form-control" id="usr"placeholder="votre Max" name="dcouche" value="<?php if(isset($dcouche)){echo $dcouche;} ?>">
      </div>
      <div class="form-group">
     <label for="usr">max au squat:</label>
     <input type="number" class="form-control" id="usr"placeholder="Votre Max squat" name="squat" value="<?php if(isset($squat)){echo $squat;} ?>">
      </div>
	  <div align="center"> <button type="submit"  name="newenvoyer" style="border-radius:0;background:#053C5C;text-align:center;"class="btn btn-primary">Enregistrer les Modifications</button></div>
								 </form>
					
						 
						 
						 
						</div>
						<div class="col-xs-2"></div>
			  
                       </div>
		
    </div>
   <!--fin--> 
    
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
 < <?php   
}
else {
  
          header('Location: Pageconnexionammeliorer.php');
}
                                                                     
?>