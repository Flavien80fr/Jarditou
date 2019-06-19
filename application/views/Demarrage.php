<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    	<link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/stylemus.css"); ?>">	
</head>

<body>

<div id="my_carousel" class="carousel slide" data-ride="carousel">
<!-- Bulles -->
<ol class="carousel-indicators">
<li data-target="#my_carousel" data-slide-to="0" class="active"></li>
<li data-target="#my_carousel" data-slide-to="1"></li>
<li data-target="#my_carousel" data-slide-to="2"></li>
</ol>
<!-- Slides -->
<div class="carousel-inner">
<!-- Page 1 -->
<div class="item active">  
<div class="carousel-page">
	<?php echo"<img class='img-responsive' style='margin:0px border:10px' 
	src=".base_url("/assets/images/musique01.jpg").'>';?>
</div> 
<div class="carousel-caption">Page 1 de présentation</div>
</div>   
<!-- Page 2 -->
<div class="item"> 
<div class="carousel-page">
	<?php echo"<img  class='img-responsive img-rounded' style='margin:0px auto' 
	src=".base_url("/assets/images/logomusique2.jpg").'>';?>
<div class="carousel-caption">Page 2 de présentation</div>
</div>  
<!-- Page 3 -->
<div class="item">  
<div class="carousel-page">
	<?php echo"<img  class='img-responsive img-rounded' style='margin:0px auto' 
	src=".base_url("/assets/images/zoom-instrument-de-musique.png").'>';?>	
</div>  
<div class="carousel-caption">Page 2 de présentation</div>
</div>     
</div>
<!-- Contrôles -->
<a class="left carousel-control" href="#my_carousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#my_carousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>



<!--
    <title>Page de démarrage</title>
    <div class="container">
    		<div class="row">
    			<div class="col-12">
    				<header>

    				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    						<button class="navbar-toggler" type="button" data-toggle="collapse"
    							data-target="#navbarSupportedContent"
    							aria-controls="navbarSupportedContent" aria-expanded="false"
    							aria-label="Toggle navigation">
    							<span class="navbar-toggler-icon"></span>
							</button>
							
    						<div class="collapse navbar-collapse" id="navbarSupportedContent">
    							<ul class="navbar-nav mr-auto">
    								<li class="nav-item active"><a class="nav-link">
    										Accueil <span class="sr-only"> (current) </span>
    								</a></li>
    								<li class="nav-item"><a class="nav-link">
									<a href="<-?php echo site_url("sitemusique/connexion"); ?>">	
    										Connexion </a></li>
    								<li class="nav-item"><a class="nav-link">
									<a href="<-?php echo site_url("sitemusique/inscription"); ?>">			
											Inscription </a></li>
									<li class="nav-item"><a class="nav-link">		
									<a href="<-?php echo site_url("sitemusique/Catégories"); ?>">			
											Catégories </a></li>
									<li class="nav-item"><a class="nav-link">		
									<a href="<-?php echo site_url("sitemusique/Liste_instruments"); ?>">			
    										Liste des instruments </a></li>						
									
    							</ul>
    							<!-form class="form-inline my-2 my-lg-0">
    								<input class="form-control mr-sm-2" type="search" name="Rechercher"
    									placeholder="Rechercher" aria-label="Rechercher">
    								<button class="btn btn-outline-success my-2 my-sm-0"
    									type="submit">Produit</button>
    							</form>
    						</div>
    				</nav>
    				</header>
                </div>
        </div>
    </div-->




  <div class="container">

  	<div class="row">
  		<div class="col-12">

            <hr>
            <?php echo validation_errors(); ?>
            <hr>
            <form action="<?= site_url("Sitemusique/Demarrage") ?>" method="post">

  				
                <h1>  </h1>

                </div>

  			</form>
  		</div>
  	</div>
</div>
</body>								

  <footer>
  	<script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</footer>
</html>
