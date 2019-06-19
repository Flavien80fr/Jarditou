<?php foreach ($cat1 as $c): ?>
    <option value="<?= $c->cat_id ?>"><?= $c->cat_nom ?></option>
<?php endforeach; ?>