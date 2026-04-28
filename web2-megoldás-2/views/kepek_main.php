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
            <img src="<?= SITE_ROOT ?>uploads/<?= $kep ?>" 
                 alt="" 
                 class="zoomable"
                 data-img="<?= SITE_ROOT ?>uploads/<?= $kep ?>">

            <?php if ($_SESSION['jog'] == '999' || $_SESSION['jog'] == 'szerelo'): ?>
                <form method="POST" class="delete-form">
                    <input type="hidden" name="torol" value="<?= $kep ?>">
                    <button type="submit" class="delete-btn"
                        onclick="return confirm('Biztos törlöd a képet?');">
                        Törlés
                    </button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<!-- Lightbox overlay -->
<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
    <img id="lightbox-img" src="">
</div>


<script>
let currentIndex = 0;
let images = Array.from(document.querySelectorAll('.zoomable')).map(img => img.dataset.img);

// Kép megnyitása
document.querySelectorAll('.zoomable').forEach((img, index) => {
    img.addEventListener('click', () => {
        currentIndex = index;
        showImage();
        document.getElementById('lightbox').style.display = 'flex';
    });
});

function showImage() {
    document.getElementById('lightbox-img').src = images[currentIndex];
}

// Bezárás (X)
document.querySelector('.lightbox .close').addEventListener('click', () => {
    document.getElementById('lightbox').style.display = 'none';
});

// Balra lépés
document.querySelector('.lightbox .prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage();
});

// Jobbra lépés
document.querySelector('.lightbox .next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % images.length;
    showImage();
});

// Háttérre kattintás = bezárás
document.getElementById('lightbox').addEventListener('click', (e) => {
    if (e.target.id === 'lightbox') {
        document.getElementById('lightbox').style.display = 'none';
    }
});

// ESC bezárás
document.addEventListener('keydown', (e) => {
    if (e.key === "Escape") {
        document.getElementById('lightbox').style.display = 'none';
    }
    if (e.key === "ArrowLeft") {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage();
    }
    if (e.key === "ArrowRight") {
        currentIndex = (currentIndex + 1) % images.length;
        showImage();
    }
});
</script>

