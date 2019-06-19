<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();		 // Appel de la fonction de connexion

// Requete affichant le code et nom catégorie
$requete = "SELECT * FROM categories";
$result = $db->query($requete);

	if (!$result)
	{
    $tableauErreurs = $db->errorInfo();
	echo $tableauErreur[2];
    die("Erreur dans la requête");
	}

	if ($result->rowCount() == 0)
	{
	// Pas d'enregistrement
	die("La table est vide");
	}

?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
<?php include("Head_formulaire.php"); ?>
</head>

<body> <!-- Début du body -->

<div class="container">

	<div class="row">
		<div class="col-12">

					<form action="Script_ajout.php" method="post">

							<!--div class="form-group"-->

								<label for="reference" class="col-sm-2 col-form-label">Référence</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="pro_ref" id="reference" maxlength='10' required>
								<span id='pro_ref__m'></span>
								</div>

								<div>
								<label for="categorie" class="col-sm-5 col-form-label">Categorie</label>
								<div class="col-sm-10">
								<select name="pro_cat_id" id="categorie" class="form-control">

									<option>Veuillez selectioner une option</option>";

									<?php

									// Renvoi de l'enregistrement sous forme d'un objet

									while ($categories = $result->fetch(PDO::FETCH_OBJ))
									{
								        echo "<option value='".$categories->cat_id."'>".$categories->cat_nom."</option>\n";
									}

									?>
								</select>

								</div>
								</div>

								<label for="libelle" class="col-sm-2 col-form-label">libelle</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="pro_libelle" id="libelle" maxlength='200' required>
								<span id="libelle_m"></span>
								</div>

								<label for="description" class="col-sm-3 col-form-label">Description</label>
								<div class="col-sm-10" row="5">
								<input type="text" class="form-control" name="pro_description" id="description" maxlength='1000' required>
								<span id="description_m"></span>
								</div>
							<!--/div-->

							<!--div class="form-group"-->
								<label for="prix" class="col-sm-3 col-form-label">Prix</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="pro_prix" id="prix" required>
								<span id="prix_m"></span>
								</div>

								<label for="stock" class="col-sm-3 col-form-label">Stock</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="pro_stock" id="stock" required>
								<span id="stock_m"></span>
								</div>
							<!--/div-->

							<div class="form-group">
								<label for="couleur" class="col-sm-3 col-form-label">Couleur</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" name="pro_couleur" id="couleur" maxlength='30' required>
								<span id="couleur_m"></span>
								</div>
							</div>

							<div class="form-group">
								<label for="choix1">Produit bloqué oui</label>
								<input type="radio" name="choix1" id="choix1" value="1">
								<label for="choix2">non</label>
								<input type="radio" name="choix1" id="choix1" value="0">
								   <!--checked="checked"-->
							</div>

							<div>
								<label for="dateajout" class="col-sm-3 col-form-label">Date d'ajout : </label>
								<div class="col-sm-3">
								<input type="date" class="form-control" name="pro_d_ajout" id="dateajout"
								<?php echo date('Y-m-d'); ?> readonly disabled>
								</div>
								<span id="dateajout_m"></span>
							</div>

							<div>
								<label for="datemodif" class="col-sm-4 col-form-label">Date de modification :</label>
								<div class="col-sm-3 col-form-input">
								<input type="datetime-local" class="form-control" name="pro_d_modif" id="datemodif" readonly disabled>
								</div>
								<span id="datemodif"></span>
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

<!-- <script src= "verification_formulaire.js"></script> -->
	<script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
<!-- fin du body -->

<footer>

<?php
// inclusion footer
include("footer_ajout.php");
?>

</footer>

</html>
<!-- fin de la page -->
<!-- fin du head -->
