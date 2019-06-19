<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Vue ajout 2</h1>
    <hr>
    <?php echo validation_errors(); ?>
    <hr>
    <form action="<?= site_url("produits/ajout2") ?>" method="post">
        <input type="text" name="pro_cat_id" value="<?= set_value("pro_cat_id") ?>"><br>
        <input type="text" name="pro_ref" value="<?= set_value("Référence") ?>"><br>
		    <input type="text" name="pro_libelle" value="<?= set_value("Libellé") ?>"><br>
        <input type="text" name="pro_description" value="<?= set_value("description") ?>"><br>
        <input type="text" name="pro_prix" value="<?= set_value("Prix") ?>"><br>
        <input type="text" name="pro_stock" value="<?= set_value("Stock") ?>"><br>
        <input type="submit">

    </form>
</body>
</html>
