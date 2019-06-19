<h2>Liste des produits</h2>


<table class="table">
    <tr>
        <th>Ref</th>
        <th>Libelle</th>
        <th>Prix</th>
    </tr>

    <?php foreach ($liste as $pro): ?>
        <tr>
            <td><?= $pro->pro_ref ?></td>
            <td><?= $pro->pro_libelle ?></td>
            <td><?= $pro->pro_prix ?></td>
            <td><a href="<?= site_url("panier/add/") . $pro->pro_id ?>">Ajouter</a></td>
        </tr>
    <?php endforeach; ?>

</table>