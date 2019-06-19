
<div class="container">
    <div class="row">
        <div class="col-12">

<form action="" method="post">

<br>
<div>
<h3>Formulaire de connexion</h3>
</div>

<div>
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="email" required><br>
    </div>
</div>

<div>
    <label for="secret" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="secret" required><br>
    </div>
</div>

<input type="submit">
<br><br>

<a href="<?= site_url("Jardiland/inscription") ?>">s'inscrire</a>

<?php
for ($i=1; $i<=25; $i++)
{
echo "<br>";
}
?>

</form>
