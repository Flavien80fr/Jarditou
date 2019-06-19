<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    	<link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <title>Formulaire modif</title>
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
                        <a href="<?php echo site_url("jardiland/formulaire_ajout"); ?>">
                        CREATE
                    </a></li>
                    <li class="nav-item active"><a class="nav-link">
                        READ
                    </a></li>
                    <li class="nav-item active"><a class="nav-link">
                        UPDATE <span class="sr-only"> (current) </span>
                    </a></li>
                    <li class="nav-item"><a class="nav-link">
                        DELETE </a></li>
                      </a></li>
                      <li class="nav-item"><a class="nav-link"
                        <a href="<?php echo site_url("jardiland/liste_produits"); ?>">
                        ACCEUIL </a></li>
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
            <?php echo validation_errors();

            $pro_id = $this->uri->segment(3);
            ?>
            <hr>


            <?php echo form_open_multipart("jardiland/formulaire_modif/".$pro_id); ?>
  							<!--div class="form-group"-->

                <h1>FORMULAIRE DE MODIFICATION</h1>

                <?php echo"<img class='img-fluid' height='100' width='250'src=".base_url
                ("/assets/photos/").$formulaire_modif->pro_id.'.'.$formulaire_modif->pro_photo.'>';?><br/>


                    <div class="file-field big">
                    <!--a class="btn-floating btn-lg amber darken-2 mt-0 float-left "-->
                      <i class="fas fa-cloud-upload-alt  "aria-hidden="true"></i>
                      <input type="file" name="pro_photo" id="pro_photo" required>
                    </a>
                    </div>


                <label for="reference" class=" left col-sm-2 col-form-label">Référence</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="pro_ref"
                   value="<?php echo  $formulaire_modif->pro_ref; ?>">
                </div>

  							<label for="libelle" class="col-sm-2 col-form-label">libelle</label>
  							<div class="col-sm-10">
  							<input type="text" class="form-control" name="pro_libelle"
                    value="<?php echo $formulaire_modif->pro_libelle; ?>">
  							<!--span id='pro_ref__m'></span-->
  							</div>

  								<div>
  								<label for="categorie" class="col-sm-5 col-form-label">Categorie</label>
  								<div class="col-sm-10">
  								<select name="pro_cat_id" class="form-control">

  									<?php
                    //  $row = $resultC->fetch(PDO::FETCH_OBJ);
                    //  echo "<option value='".$row->cat_id."'>".$row->cat_nom."</option>"; OK

                    // var_dump($liste_categorie);

                    foreach ($liste_categorie as $row)
                    {
                          echo "<option value='".$row->cat_id."'";
                          if ($row->cat_id == $formulaire_modif->pro_cat_id)
                          {
                                    echo " selected";
                          }
                                    echo ">".$row->cat_nom."</option>\n";
                    }
  									?>
  								</select>

  								</div>
  								</div>

  								<label for="description" class="col-sm-3 col-form-label">Description</label>
  								<div class="col-sm-10" row="5">
  								<input type="text" class="form-control" name="pro_description"
                      value="<?php echo $formulaire_modif->pro_description; ?>">
  								<!--span id="description_m"></span-->
  								</div>

  							<!--div class="form-group"-->
  								<label for="prix" class="col-sm-3 col-form-label">Prix</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_prix"
                      value="<?php echo $formulaire_modif->pro_prix; ?>">
  								<!--span id="prix_m"></span-->
  								</div>

  								<label for="stock" class="col-sm-3 col-form-label">Stock</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_stock" required
                      value="<?php echo $formulaire_modif->pro_stock; ?>">
  								<!--span id="stock_m"></span-->
  								</div>
  							<!--/div-->

  							<div class="form-group">
  								<label for="couleur" class="col-sm-3 col-form-label">Couleur</label>
  								<div class="col-sm-10">
  								<input type="text" class="form-control" name="pro_couleur" maxlength='30' required
                      value="<?php echo $formulaire_modif->pro_couleur; ?>">
  								<!--span id="couleur_m"></span-->
  								</div>
  							</div>

                <div class="form-group">
								<label for="choix1">Produit bloqué oui</label>
								<input type="radio" name="pro_bloque" value=1
								  <?php if ($formulaire_modif->pro_bloque==1) { echo " checked"; } ?>>

								  <label for="choix2">non</label>
								<input type="radio" name="pro_bloque" value=0
								  <?php if ($formulaire_modif->pro_bloque==0) { echo " checked"; } ?>>
								<!--checked="checked"-->
							</div>

  							<div>
  								<label for="dateajout" class="col-sm-3 col-form-label">Date d'ajout : </label>
  								<div class="col-sm-3">
  								<input type="date" class="form-control" name="pro_d_ajout"
  								value="<?php $formulaire_modif->pro_d_ajout; ?>" readonly>
  								</div>
  								<!--span id="dateajout_m"></span-->
  							</div>

  							<div>
  								<label for="datemodif" class="col-sm-4 col-form-label">Date de modification :</label>
  								<div class="col-sm-3 col-form-input">
  								<input type="datetime-local" class="form-control" name="pro_d_modif"
                  value="<?php echo date('Y-m-d H:m:s'); ?>" readonly>
  								</div>
  								<!--span id="datemodif"></span-->
  							</div>



  							<!--button type="submit" class="btn btn-primary" id='bouton_envoi'>Envoyer</button-->
  							<!--button type="reset"  class="btn btn-primary" id='bouton_envoi'>Annulez</button  value="annuler" ??? -->

  							<button type="submit" class="btn btn-primary" value="Envoyer" id='bouton_envoi'>
                  Envoyer</button>
  							<button type="reset"  class="btn btn-primary" id='bouton_envoi'>Annulez</button>

  					</form>
  		</div>
  	</div>
  	<br>

  </div>


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
                 <a href="<?php echo site_url("jardiland/formulaire_ajout"); ?>">
                 CREATE
              </a></li>
              <li class="nav-item active"><a class="nav-link">
                  READ
              </a></li>
              <li class="nav-item active"><a class="nav-link">
                  UPDATE <span class="sr-only"> (current) </span>
              </a></li>
              <li class="nav-item"><a class="nav-link"
                onclick="return confirm('Etes vous sûr de vouloir supprimer ce produit ?')"
                <a href="<?php echo site_url("jardiland/formulaire_suppression/".$formulaire_modif->pro_id); ?>">
                  DELETE </a></li>
              </a></li>
              <li class="nav-item"><a class="nav-link"
                  <a href="<?php echo site_url("jardiland/liste_produits"); ?>">
                  ACCUEIL </a></li>
            </ul>
          </div>
        </nav>
</footer>
  <!-- fin du footer -->
  <!-- <script src= "verification_formulaire.js"></script> -->
  	<script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src= "<?php echo base_url("assets/js/js.js"); ?>"></script>

</body>
</html>
