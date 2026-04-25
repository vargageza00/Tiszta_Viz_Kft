<pre>
<?php
var_dump(isset($kepek) ? $kepek : 'NINCS $kepek');
?>
</pre>
<h2>Képfeltöltés</h2>

<?php if (isset($uzenet)) : ?>
    <p><?= $uzenet ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <label>Kép kiválasztása:</label>
    <input type="file" name="kep" required>
    <button type="submit">Feltöltés</button>
</form>

<hr>

<h2>Feltöltött képek</h2>

<div style="display:flex; flex-wrap:wrap; gap:10px;">
<?php if (isset($kepek)) : ?>
    <?php foreach ($kepek as $kep) : ?>
        <div style="border:1px solid #ccc; padding:5px;">
            <img src="<?= SITE_ROOT ?>uploads/<?= $kep ?>" style="max-width:200px;">
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
