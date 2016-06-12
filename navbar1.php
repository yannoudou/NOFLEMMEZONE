  <!-- debut nav-bar -->
 	
<div class="container" style=" background-color: white;" >
	<div class="row top-container">
		<div class="col-md-3"> <a class="pull-left"> <img alt="" src="icon1.png" class="icon img-responsive" style="height:110px;" ></a> </div>
		<div class="col-md-5">
			<form class="navbar-form navbar-right navbar-form1" role="search">
        		<div class="form-group input-group">
          			<input type="text" class="form-control" placeholder="Search..">
          				<span class="input-group-btn">
            			<button class="btn btn-default btn1" type="button">
              			<span class="glyphicon glyphicon-search"></span>
            			</button> 
          				</span>        
        		</div>
      		</form> 
      </div>
		<div class="col-md-4">
			<div class="col-lg-6"><a href="" style="padding: 20px 20px;background: #E25326;color: white;float:right;margin-top:20px;text-decoration: none;">Welcome  <?php {echo $userdon['pseudo'];} ?>  </a></div>
			<div class="col-lg-6"> 
            <div class="dropdown" style="float: right; margin-top: 20px;" > 
                                      <?php                                               
		  
                                      if(!empty($userdon['avatar']))
                                      {
                                       ?>
                                       <img src="membres/avatar/<?php echo $userdon['avatar'];?>" alt="" class=" dropdown-toggle img-circle" id="dropdbar" data-toggle="dropdown" style="  height:50px; width : 50px;" >
                                       <?php 
                                      }
                                      ?>
									  </div>
			  </div>
       
		</div>
			
		

    
        






	</div>

</div>
  

<div class="container">

<nav class="navbar navbar-inverse navbar1" style="background-color:#053C5C; border:none;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Homepage.php">Home</a></li>
        <li ><a href="pagevideovrai.php"> Videos </a></li>
          
        
        <li><a href="pagearticlevrai.php"> Articles </a></li>
        <li><a href="#"> About Us </a></li>
		<li><a href="#"> New </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"> Forum </a></li>
		<li><a href="pagedeconnexion.php"> Se deconnecter </a></li>
        <li class=""><a class="dropdown-toggle" data-toggle="dropdown" href="profil.php">Profil </a>
        <ul class="dropdown-menu">
                                          <li> <a href="profilameliore.php?id=<?php echo urlencode($_SESSION['id']);?>" style="border:none !important;">Votre Profil</a></li>
                                            <li> <?php if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {?><a href="#">Messages</a><?php } ?></li>
                                            <li> <?php if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {?><a href="#">Voir ses Stats</a><?php } ?></li>
                                               <li> <?php if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {?><a href="#">Calculer ses Stats</a><?php } ?></li>
                                                 <li> <?php if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {?><a href="modifierprofilameliorer.php" style="border:none !important;">Editer Profil</a><?php } ?></li>
                                             <li role="separator" class="divider"></li>
                                            <li> <?php if (isset($_SESSION['id']) AND $userdon['id'] == $_SESSION['id']) {?><a href="pagedeconnexion.php" style="border:none !important;"><span>Deconnecter</a></span><?php } ?></li>
                                             
        </ul>
      </li>
		
      </ul>
    </div>
  </div>
</nav>

<!-- fin nav-bar -->