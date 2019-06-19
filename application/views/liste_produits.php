
<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Articles de jardins, fruits, legumes, graines |Jardiland</title>
  <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
  <meta name="description" content="Le meilleur de la Nature avec des références de qualités
  sur les outillages de jardin, arbuste, plants et semis, tondeuse, débroussailleuse,
  brouette, sécateur, pot de fleur, soucoupe, tomate, poireau, salade, haricot, aubergine,
  choux, potiron, citrouille, courgette, pomme, poire, peche, abricot," />
  <meta name="keywords" content="outillage, tondeuse, secateur, brouette, pot de fleurs,
  soucoupe, jardin, arbuste, thuya, olivier, légume, tomate, salade, poireau,
  courgette, aubergine, fruit, pomme, poire, peche, plante, plants, semis" />
  <meta name="robots" content="INDEX,FOLLOW" />
        <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
        <!--meta http-equiv="X-UA-Compatible" content="ie=edge"-->
  <link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">

<style>
.slidein {
  animation-duration: 20s;
  animation-name: slidein;
  animation-iteration-count: 3;
  animation-direction: alternate;
}
@keyframes slidein {
  from {
    margin-left:100%;
    width:300%
  } 
  to {
    margin-left:0%;
    width:100%;
  }
}

p {
        animation-duration: 20s;
        animation-name: slidein;
        animation-iteration-count: infinite;
        animation-direction: alternate;
  }

</style>

      <div class="container">
        	<div class="row">
        		<div class="col-12">
        			<header>
                
                <p>
                <?php echo"<color: #8cf291>";?>
                <?php echo"<img class='img-fluid' height='100' width='200'src=".base_url
                ("/assets/photos/jarditou_logo.jpg").'>';?><br/>
                </p>

              <!--table>
                  <tr>
                    <-?php echo"<img class='img-fluid' height='100' width='283'src=".base_url
                    ("/assets/photos/jardin4.jpg").'>';?></td-->
                    <!--?php echo"<img class='img-fluid' height='100' width='282'src=".base_url
                    ("/assets/photos/jardin2.jpg").'>';?></td-->
                    <!--?php echo"<img class='img-fluid' height='100' width='282'src=".base_url
                    ("/assets/photos/jardin5.jpg").'>';?></td-->
                    <!--?php echo"<img class='img-fluid' height='100' width='283'src=".base_url
                    ("/assets/photos/jardin9.jpg").'>';?></td>
                  </tr>
              </table-->
                <div>
                
                    <?php echo"<img class='img-fluid' height='100' width='280'src=".base_url
                    ("/assets/photos/jardin4.jpg").'>';?>
                    <?php echo"<img class='img-fluid' height='100' width='278'src=".base_url
                    ("/assets/photos/jardin2.jpg").'>';?>
                    <?php echo"<img class='img-fluid' height='100' width='278'src=".base_url
                    ("/assets/photos/jardin5.jpg").'>';?>
                    <?php echo"<img class='img-fluid' height='100' width='280'src=".base_url
                    ("/assets/photos/jardin9.jpg").'>';?>
                  
                <div>

                <!--?php echo"<img class='img-fluid' height='100' width='250'src=".base_url
                ("/assets/photos/jarditou_logo.jpg").'>';?><br/-->

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

                        <li class="nav-item"><a class="nav-link" 
                            href="<?= site_url("jardiland/liste") ?>">
                            Panier (<?= ($this->session->panier)?count($this->session->panier):0 ?>)</a>
                          </li>
                          <li class="nav-item">
                              <?php if ($this->session->user): ?>
                              <a class="nav-link" href="<?= site_url("jardiland/logout") ?>" tabindex="-1" aria-disabled="true">Deconnexion</a>
                              <?php else: ?>
                              <a class="nav-link" href="<?= site_url("jardiland/login") ?>" tabindex="-1" aria-disabled="true">Connexion</a>
                              <?php endif; ?>
                            </li>


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

</head>
<body>
<?php // echo"" ?>;
<h1>Liste des produits</h1>

<?php

//echo "<div class='table-responsive'>";
//echo "<table class='table table-bordered table-striped table-hover'>";
echo "<table border=5 bgcolor=#4EA9A0 text align=center width=1100>";
echo "<thead>";
echo "<tr width='1100'>";
echo "<th width='300' class='text-center'>PHOTO</th>";
echo "<th width='120' class='text-center'>pro_id</th>";         // remplacer th par td pour alignement
echo "<th width='100' class='text-center'>cat_id</th>";
echo "<th width='100' class='text-center'>Référence</th>";
echo "<th width='250' class='text-center'>Libellé</th>";
echo "<th width='50'  class='text-center'>Bloqué</th>";
echo "<th width='250' class='text-center'>Date Modif</th>";
echo "<th width='65' class='text-center'>Panier</th>";
echo "</tr>";
echo "</thead>"; $a=0;

foreach ($liste_produits as $row)
{
  echo"<tr width='1100'>";
  //echo"<a href='formulaire_ajout.php{$s}'>mon lien</a>";
  $a++;

  if ($a== 1) echo "<table border=3 bgcolor=#85C630 text align=center width=1100>";
  if ($a== 2) echo "<table border=3 bgcolor=#CDDE47 text align=center width=1100>";
  if ($a== 2) $a=0;

  // echo"<td width=100 text align center>".$row->pro_id."</th>";

  $sUrlImage = base_url('/assets/photos/'.$row->pro_id.'.'.$row->pro_photo);
  $sUrl2 = site_url("Jardiland/formulaire_visu/".$row->pro_id);
  echo"<td><a href='".$sUrl2."'><img src='".$sUrlImage."' class='img-fluid' height='100' width='250'></a></td>";
  echo"<td width='130' class='text-center'>
  <a href='".site_url("Jardiland/formulaire_visu/".$row->pro_id)."'>".$row->pro_id."</a></td>";
  echo"<td width='110' class='text-center'>".$row->pro_cat_id."</td>";
  echo"<td width='100' class='text-center'>".$row->pro_ref."</td>";
  echo"<td width='250' class='text-center'>
  <a href='".site_url("Jardiland/formulaire_visu/".$row->pro_id)."'>".$row->pro_libelle."</a></td>";
  echo"<td width=' 70' class='text-center'>".$row->pro_bloque."</td>";
  echo"<td width='250' class='text-center'>".$row->pro_d_modif."</td>";
  //echo"<td><a href='formulaire_ajout.php?pro_id=".$row->pro_id."'>".$row->pro_id."</a></td>";
  ?>
  <td width 100><a href="<?= site_url("jardiland/add/") . $row->pro_id ?>">Ajouter</a></td>
  <?php
  echo"</tr>";
}

echo "</table>"; //echo "</div>";
echo "<br>";
?>
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
              <li class="nav-item active"><a class="nav-link"
                  href="<?php echo site_url("jardiland/liste_produits"); ?>">
                  ACCUEIL <span class="sr-only"> (current) </span>
              </a></li>
              <li class="nav-item"><a class="nav-link"
                  href="<?php echo site_url("jardiland/formulaire_ajout"); ?>">
                  CREATE </a></li>         
              <!--li class="nav-item"><a class="nav-link">
                  READ </a></li>
              <li class="nav-item"><a class="nav-link">
                  UPDATE </a></li>
              <li class="nav-item"><a class="nav-link">
                  DELETE </a></li-->
            </ul>

          </div>

        </nav>

  <!-- fin du footer -->
  <!-- <script src= "verification_formulaire.js"></script> -->
  	<script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</footer>
</html>
