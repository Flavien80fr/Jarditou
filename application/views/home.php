<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>CI Formulaires</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<style>
html
{
   font-size: 100%;
}

body
{
    font-size: 1rem; /* Si html fixé à 100%, 1rem = 16px = taille par défaut de police de Firefox ou Chrome */
}
</style>
</head>
<body>
<div class="container">

    <div class="row">
	    <div class="col-12">
          <h1 class="pb-1 border-bottom">Formulaires avec CodeIgniter</h1>
      </div>  <!-- .col -->
	 </div>  <!-- .row -->

	 <div class="row">
	    <div class="col-12">
	        <a href="<?php echo site_url("home/democode"); ?>" title="Formulaire">Formulaire</a>
	        <hr>
	        <a href="<?php echo site_url("upload"); ?>" title="Upload">Upload</a>
	    </div>
	 </div> <!-- .row -->
</div> <!-- .container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
