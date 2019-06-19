
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<br>
                <div id='p'>
                <p>
                <?php echo"<color: #8cf291>";?>
                <?php echo"<img class='img-fluid' height='100' width='200'src=".base_url
                ("/assets/photos/jarditou_logo.jpg").'>';?><br/>
                </div>

<div class="container">
    <div class="row">
    	<div class="col-12">

<table class="table">
    <tr>
    <th>Ref</th>
    <th>Libelle</th>
    <th>Quantite</th>
    <th>Prix</th>
    <th>Total</th>
    </tr>

    <?php 
        $total=0; $quantite=0;
        foreach ($this->session->panier as $pro): 
    ?>
        <tr>
            <td><?= $pro->pro_ref ?></td>
            <td><?= $pro->pro_libelle ?></td>
            <td><?= $pro->quantite ?></td>
            <td><?= $pro->pro_prix ?></td>
            <td><?= $pro->pro_prix*$pro->quantite ?></td>
            <td><button class="btn btn-info btn-block" v-on:click="modifier($index)"><i class="fa fa-edit fa-lg"></button></td>
            <td><button class="btn btn-danger btn-block" v-on:click="supprimer($index)"><i class="fa fa-trash-o fa-lg"></i></button></td>
        </tr>
    <?php 
            $total = $total + $pro->pro_prix*$pro->quantite;
        endforeach; ?>


</table>
<hr>
TOTAL= <?= $total ?>
<hr>
<div>
<label for="categorie" class="col-sm-1 col-form-label"> <a href="<?= site_url("jardiland/clear") ?>">Vider</a></label>
<label for="categorie" class="col-sm-1 col-form-label"> <a href="<?= site_url("jardiland/clear") ?>">Facture</a></label>

        </div>
    </div>
</div>
<br>
        <div id='p2'>
        <p>
        <?php echo"<color: #8cf291>";?>
        <?php echo"<img class='img-fluid' height='30' width='30'src=".base_url
        ("/assets/photos/nain-image-animee-0026.gif").'>';?><br/>
        </p>
      </div>
