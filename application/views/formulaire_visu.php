<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    	<link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <title>Formulaire visualisation</title>
</head>
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
                         href="<?php echo site_url("jardiland/formulaire_ajout"); ?>">
						CREATE
						</a></li>
    				<li class="nav-item active"><a class="nav-link">
    					READ <span class="sr-only"> (current) </span>
    					</a></li>
    				<li class="nav-item"><a class="nav-link"
                     href="<?php echo site_url("jardiland/formulaire_modif/".$formulaire_visu->pro_id); ?>">
    					UPDATE
                    	</a></li>
    				<li class="nav-item"><a class="nav-link"
					 id="formulaire_visu_delete" href="<?php echo site_url("jardiland/formulaire_suppr/".$formulaire_visu->pro_id."/".$formulaire_visu->pro_photo); ?>">	
    					DELETE </a></li>
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

  <div class="container">

  	<div class="row">
  		<div class="col-12">

            <hr>
            <?php echo validation_errors();
            $pro_id = $this->uri->segment(3);
            ?>
            <hr>
            <form action="<?= site_url("jardiland/formulaire_visu") ?>" method="post">

  							<!--div class="form-group"-->

                <h1>FORMULAIRE DE VISUALISATION</h1>

                <!-- Affichage image -->
               <?php echo"<img class='img-fluid' height='100' width='250'src=".base_url
               ("/assets/photos/").$formulaire_visu->pro_id.'.'.$formulaire_visu->pro_photo.'>';?><br/>

                <label for="reference" class="col-sm-2 col-form-label">Référence</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="pro_ref"
                    value="<?php echo $formulaire_visu->pro_ref; ?>" readonly>
                </div>

  							<label for="libelle" class="col-sm-2 col-form-label">libelle</label>
  							<div class="col-sm-10">
  							<input type="text" class="form-control" name="pro_libelle"
                    value="<?php echo $formulaire_visu->pro_libelle; ?>" readonly>
  							<!--span id='pro_ref__m'></span-->
  							</div>

  								<div>
  								<label for="categorie" class="col-sm-5 col-form-label">Categorie</label>
  								<div class="col-sm-10">
                  <input type="text" class="form-control" name="categorie"
                      value="<?php echo $formulaire_visu->pro_cat_id; ?>" readonly>
  									<?php
                    //  $row = $resultC->fetch(PDO::FETCH_OBJ);
                    //  echo "<option value='".$row->cat_id."'>".$row->cat_nom."</option>"; OK

                    // var_dump($liste_categorie);
                    ?>
  								</div>
  								</div>

  								<label for="description" class="col-sm-3 col-form-label">Description</label>
  								<div class="col-sm-10" row="5">
  								<input type="text" class="form-control" name="pro_description"
                      value="<?php echo $formulaire_visu->pro_description; ?>" readonly>
  								<!--span id="description_m"></span-->
  								</div>

  							<!--div class="form-group"-->
  								<label for="prix" class="col-sm-3 col-form-label">Prix</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_prix"
                      value="<?php echo $formulaire_visu->pro_prix; ?>" readonly>
  								<!--span id="prix_m"></span-->
  								</div>

  								<label for="stock" class="col-sm-3 col-form-label">Stock</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_stock" required
                      value="<?php echo $formulaire_visu->pro_stock; ?>" readonly>
  								<!--span id="stock_m"></span-->
  								</div>
  							<!--/div-->

  							<div class="form-group">
  								<label for="couleur" class="col-sm-3 col-form-label">Couleur</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_couleur" maxlength='30' required
                      value="<?php echo $formulaire_visu->pro_couleur; ?>" readonly>
  								<!--span id="couleur_m"></span-->
  								</div>
  							</div>

                <div class="form-group">
								<label for="choix1">Produit bloqué oui</label>
								<input type="radio"
								  <?php if ($formulaire_visu->pro_bloque==1) { echo " checked"; } ?>>
								  <label for="choix2">non</label>
								<input type="radio"   readonly
								  <?php if ($formulaire_visu->pro_bloque==0) { echo " checked"; } ?>>
								<!--checked="checked"-->
							</div>

  							<div>
  								<label for="dateajout" class="col-sm-3 col-form-label">Date d'ajout : </label>
  								<div class="col-sm-3">
  								<input type="date" class="form-control" name="pro_d_ajout"
  								value="<?php echo $formulaire_visu->pro_d_ajout ?>" readonly>
  								</div>
  								<!--span id="dateajout_m"></span-->
  							</div>

  							<div>
  								<label for="datemodif" class="col-sm-4 col-form-label">Date de modification :</label>
  								<div class="col-sm-3 col-form-input">
  								<input type="datetime-local" class="form-control" name="pro_d_modif"
                  value="<?php echo $formulaire_visu->pro_d_modif ?>" readonly>
  								</div>
  								<!--span id="datemodif"></span-->
  							</div>

  							<p></p>

  							<!--button type="submit" class="btn btn-primary" id='bouton_envoi'>Envoyer</button-->
  							<!--button type="reset"  class="btn btn-primary" id='bouton_envoi'>Annulez</button  value="annuler" ??? -->

  							<!--button type="submit" class="btn btn-primary" value="Envoyer" id='bouton_envoi'>Envoyer</button>
  							<button type="reset"  class="btn btn-primary" id='bouton_envoi'>Annulez</button-->

  					</form>
  		</div>
  	</div>
  	<br>

  </div>

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
               href="<?php echo site_url("jardiland/formulaire_ajout"); ?>">
                  CREATE
              </a></li>
              <li class="nav-item active"><a class="nav-link">
                  READ <span class="sr-only"> (current) </span>
              </a></li>
              <li class="nav-item"><a class="nav-link"
               href="<?php echo site_url("jardiland/formulaire_modif/".$formulaire_visu->pro_id); ?>">
                  UPDATE
              </a></li>
              <li class="nav-item"><a class="nav-link"
                 id="formulaire_visu_delete" href="<?php echo site_url("jardiland/formulaire_suppr/".$formulaire_visu->pro_id."/".$formulaire_visu->pro_photo); ?>">
                  DELETE </a></li>
              <li class="nav-item"><a class="nav-link"
               href="<?php echo site_url("jardiland/liste_produits"); ?>">
                  RETOUR Liste Produits </a></li>
            </ul>

          </div>
        </nav>
</body>
<footer>
  <!-- <script src= "verification_formulaire.js"></script> -->
  	<script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script src= "verification_formulaire.js"></script>
     <script src= "<?php echo base_url("assets/js/js.js"); ?>"></script>
</footer>
</html>
