<link rel="stylesheet" href="<?= SITE_ROOT ?>css/kepek_main.css">
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
<div class="gallery">
<?php if (!empty($kepek)) : ?>
    <?php foreach ($kepek as $kep) : ?>
        <div class="gallery-item">
            <img src="<?= SITE_ROOT ?>uploads/<?= $kep ?>" alt="">
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

