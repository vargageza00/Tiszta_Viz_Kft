<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MVC - PHP</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></em></div>
            <h1 class="header">Web-programozás II - MVC alkalmazás</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
            <a href="https://www.uni-neumann.hu" target="_blank" style="background-color:white; padding:0;"><img src="<?=SITE_ROOT?>\images\nje.png" width="150"></a><br>
            <a href="https://neptun.uni-neumann.hu" target="_blank" style="background-color:white; padding:0;"><img src="<?=SITE_ROOT?>\images\neptun.png" width="150"></a><br>
            <a href="https://gamf.uni-neumann.hu" target="_blank" style="background-color:white; padding:0;"><img src="<?=SITE_ROOT?>\images\gamf.png" width="150"></a><br>
        </aside>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; NJE - GAMF - Informatika Tanszék <?= date("Y") ?></footer>
    </body>
</html>
