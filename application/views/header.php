<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    	<link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <title>header</title>
</head>

<style>

</style>

<body> <!-- Début du body -->
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
            				        <li class="nav-item"><a class="nav-link"
                                    href="<?php echo site_url("jardiland/liste_produits"); ?>">
            	    			    ACCUEIL <span class="sr-only"> (current) </span>
            		    		    </a></li>
            			    	    <li class="nav-item"><a class="nav-link"
                                    href="<?php echo site_url("jardiland/formulaire_ajout"); ?>">
        		    			    CREATE </a></li>
                                    <li class="nav-item"><a class="nav-link"
                                    href="<?php echo site_url("jardiland/login"); ?>">
                                    CONNEXION </a></li>>
                                    <li class="nav-item"><a class="nav-link"
                                    href="<?php echo site_url("jardiland/inscription"); ?>">
                                    INSCRIPTION </a></li>>    
                				</ul>
    			        	</div>
    			    </nav>
    			</header>
            </div>
        </div>
	</div>

	<br>
	<div class="row">
            <div class="col-12">
                <?php if ($this->session->message): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php
                            echo $this->session->message;
                            $this->session->message = null;
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
	</div> 