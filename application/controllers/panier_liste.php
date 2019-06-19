<table class="table">
    <tr>
    <th>Ref</th>
    <th>Libelle</th>
    <th>Prix</th>
    </tr>

    <?php foreach ($this->session->panier as $pro): ?>
        <tr>
            <td><?= $pro->pro_ref ?></td>
            <td><?= $pro->pro_libelle ?></td>
            <td><?= $pro->pro_prix ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<hr>
<a href="<?= site_url("jardiland/clear") ?>"></a>