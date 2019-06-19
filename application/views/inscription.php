
<div class="container">
    <div class="row">
        <div class="col-12">

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?> 
<form action="" method="post">

<br>
<div>
<h3>Formulaire d'inscription</h3>
</div>

<div>
    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="nom" <?php set_value('Nom'); ?> > <br>
    </div>
</div>    

<div>
    <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="prenom" <?php set_value('prenom') ?> ><br>
    </div>
</div>

<div>
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="email" <?php set_value('email') ?> > <br>
    </div>
</div>

<div>
    <label for="secret" class="col-sm-2 col-form-label">Mot de passe</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="secret" <?php set_value('secret') ?> ><br>
    </div>
</div>

<div>
    <label for="secret" class="col-sm-3 col-form-label">Confirmation mot de passe</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="conpass" <?php set_value('conpass') ?>
    </div>
</div><br>

<div>

<select statut=value id=statut name="statut">
    <option value="Administrateur">Administrateur</option>
    <option value="Gestion">Gestion</option>
    <option value="Utilisateur">Utilisateur</option>
</select> 
</div><br>


<input type="submit">
<?php
for ($i=1; $i<=15; $i++)
{
echo "<br>";
}
?>

</form>