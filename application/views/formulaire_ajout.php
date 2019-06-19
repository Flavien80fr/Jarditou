<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    	<link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <title>Formulaire Ajout</title>
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
    										CREATE <span class="sr-only"> (current) </span>
    								</a></li>
    								<li class="nav-item"><a class="nav-link"
                       			 href="<?php echo site_url("jardiland/liste_produits"); ?>">
    										Accueil </a></li>
    								<li class="nav-item"><a class="nav-link">
    										Contact </a></li>
    							</ul>
    							<!--form class="form-inline my-2 my-lg-0">
    								<input class="form-control mr-sm-2" type="search" name="Rechercher"
    									placeholder="Rechercher" aria-label="Rechercher">
    								<button class="btn btn-outline-success my-2 my-sm-0"
    									type="submit">Produit</button>
    							</form-->
    						</div>
    				</nav>
    				</header>
                </div>
        </div>
    </div>
    </head>

  <body> <!-- Début du body -->

  <div class="container">

  	<div class="row">
  		<div class="col-12">

            <hr>
            <?php echo validation_errors(); ?>
            <hr>
            <form action="<?= site_url("jardiland/formulaire_ajout") ?>" method="post">

  							<!--div class="form-group"-->

                <h1>FORMULAIRE DE CREATION</h1>

                <label for="reference" class="col-sm-2 col-form-label">Référence</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="pro_ref" maxlength='10' required
                    value="<?= set_value("pro_ref") ?>">
                </div>

  							<label for="libelle" class="col-sm-2 col-form-label">libelle</label>
  							<div class="col-sm-10">
  							<input type="text" class="form-control" name="pro_libelle"  maxlength='200' required>
  							<!--span id='pro_ref__m'></span-->
  							</div>

							<div>
  							<label for="categorie" class="col-sm-5 col-form-label">Categorie</label>
  							<div class="col-sm-10">
						    <select name="cat1" id="cat1">
						    </select>
							</div></div>
							
							<br>

							<div>
  							<label for="categorie" class="col-sm-5 col-form-label">Sous-Categorie</label>
  							<div class="col-sm-10">
							<select name="cat2" id="cat2">
							<option value="">...</option>
							</select>
							</div></div><br>


							<div class="file-field big">
		                    <!--a class="btn-floating btn-lg amber darken-2 mt-0 float-left "-->
        		              <i class="fas fa-cloud-upload-alt  "aria-hidden="true"></i>
                		      <input type="file" name="pro_photo" id="pro_photo" required>
                    			</a>
                    		</div>

	
  								<label for="description" class="col-sm-3 col-form-label">Description</label>
  								<div class="col-sm-10" row="5">
  								<input type="text" class="form-control" name="pro_description" maxlength='1000' required
                     			 value="<?= set_value("pro_description") ?>">
  								<!--span id="description_m"></span-->
  								</div>

  							<!--div class="form-group"-->
  								<label for="prix" class="col-sm-3 col-form-label">Prix</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_prix" id="prix" required
                   				   value="<?= set_value("pro_prix") ?>">
  								<!--span id="prix_m"></span-->
  								</div>

  								<label for="stock" class="col-sm-3 col-form-label">Stock</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_stock" required
                   				   value="<?= set_value("pro_stock") ?>">
  								<!--span id="stock_m"></span-->
  								</div>
  							<!--/div-->

  							<div class="form-group">
  								<label for="couleur" class="col-sm-3 col-form-label">Couleur</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_couleur" maxlength='30' required
               				       value="<?= set_value("pro_couleur") ?>">
  								<!--span id="couleur_m"></span-->
  								</div>
  							</div>

  							<div class="form-group">
  								<label for="choix1">Produit bloqué oui</label>
  								<input type="radio" name="pro_bloque" value="1">
  								<label for="choix2">non</label>
  								<input type="radio" name="pro_bloque" value="0">
  								   <!--checked="checked"-->
  							</div>



  								<label for="dateajout" class="col-sm-3 col-form-label">Date d'ajout : </label>
  								<div class="col-sm-3">
  								<input type="date" class="form-control" name="pro_d_ajout"
  								value="<?php echo date('Y-m-d'); ?>" readonly>
  								</div>
  								<!--span id="dateajout_m"></span-->
  							</div>

                </div>

  							<div>
  								<label for="datemodif" class="col-sm-4 col-form-label">Date de modification :</label>
  								<div class="col-sm-3 col-form-input">
  								<input type="datetime-local" class="form-control" name="pro_d_modif" readonly disabled>
  								</div>
  								<!--span id="datemodif"></span-->
  							</div>

  							<p></p>

  							<!--button type="submit" class="btn btn-primary" id='bouton_envoi'>Envoyer</button-->
  							<!--button type="reset"  class="btn btn-primary" id='bouton_envoi'>Annulez</button  value="annuler" ??? -->

  							<button type="submit" class="btn btn-primary" value="Envoyer" id='bouton_envoi'>Envoyer</button>
  							<button type="reset"  class="btn btn-primary" id='bouton_envoi'>Annulez</button>

  					</form>
  		</div>
  	</div>
  	<br>

  </div>
</body>

<footer>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <!-- <a class="navbar-brand" href="#" color=blue> Produit Jarditou</a> -->
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
                  RETOUR Liste produits</a></li>
              <!--li class="nav-item active"><a class="nav-link">
                  AJOUT <span class="sr-only"> (current) </span>
                               </a></li>
              <!li class="nav-item active"><a class="nav-link" href="formulaire_ajout.php">
                AJOUT <span class="sr-only"> (current) </span>
                               </a></li>
              <li class="nav-item"><a class="nav-link" href="modification.php">
                                      MODIFICATION </a></li>
                              <li class="nav-item"><a class="nav-link" href="suppression.php">
                  SUPPRESSION </a></li-->
            </ul>

          </div>
        </nav>

  <!-- fin du footer -->
  <!-- <script src= "verification_formulaire.js"></script> -->
  	<script src= "https://code.jquery.com/jquery-3.3.1.min.js"></script>
	  
  	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
       integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1">
	  </script>
  	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	  <script>
							$("#cat2").hide();
							$("#cat1").load('<?= site_url('ajax/cat1') ?>');
							$("#cat1").change(function() {
								$("#cat2").show();
								let cat_id = $("#cat1").val();
								$("#cat2").load('<?= site_url('ajax/cat2') ?>' + '/' + cat_id);
							});
							</script>
</footer>
</html>
