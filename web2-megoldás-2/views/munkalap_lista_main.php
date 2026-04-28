<div style="overflow-x:auto;">
<table border="1">
    <tr>
        <th>ID</th>
        <th>Beadás</th>
        <th>Javítás</th>
        <th>Munkaóra</th>
        <th>Hely</th>
        <th>Szerelő</th>
        <th>Anyagár</th>
        <th>Művelet</th>
        
    </tr>

    <?php foreach ($viewData['lista'] as $sor): ?>
        <tr>
            <td><?= $sor['id'] ?></td>
            <td><?= $sor['bedatum'] ?></td>
            <td><?= $sor['javdatum'] ?></td>
            <td><?= $sor['munkaora'] ?></td>
            <td><?= $sor['helyaz'] ?></td>
            <td><?= $sor['szereloaz'] ?></td>
            <td><?= $sor['anyagar'] ?></td>
            <td>
                <?php if ($_SESSION['jog'] == '999' || $_SESSION['jog'] == 'szerelo'): ?>
                    <a href="index.php?munkalap_modositas/<?= $sor['id'] ?>">Módosítás</a>
                <?php endif; ?>
                <?php if ($_SESSION['jog'] == '999'): ?>
                    <a href="index.php?munkalap_torles/<?= $sor['id'] ?>">Törlés</a>
                <?php endif; ?>
                <?php if ($_SESSION['jog'] == '111' || $_SESSION['jog'] == ''): ?>
                    <a style="display:block; text-align:center;">Nincs jogosultsága!</a>
                <?php endif; ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<?php if ($_SESSION['jog'] == '999' || $_SESSION['jog'] == 'szerelo'): ?>
<a href="index.php?munkalap_uj">Új munkalap</a>
<?php endif; ?>
</div>