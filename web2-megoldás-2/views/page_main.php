<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiszta Víz Kft. – Munkalapkezelő rendszer</title>
    <link rel="stylesheet" href="<?= SITE_ROOT ?>css/main_style.css">
</head>

<body>

<header>
    <div class="user-info">
        <?php if($_SESSION['userid'] > 0): ?>
            <span>Bejelentkezett: 
                <?= $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'] ?>
                (<?= $_SESSION['loginname'] ?>)
            </span>
        <?php endif; ?>
    </div>

    <h1>Tiszta Víz Kft. – Munkalapkezelő rendszer</h1>
</header>

<nav>
    <?php Menu::getMenu(); ?>
</nav>

<main>
    <?php include($viewFile); ?>
</main>

<footer>
    <p>&copy; <?= date("Y") ?> Tiszta Víz Kft.</p>
</footer>

</body>
</html>
