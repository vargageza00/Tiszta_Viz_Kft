<h2>Helyek listája</h2>

<?php if ($_SESSION['jog'] !== 'user'): ?>
    <p><a href="index.php?hely/uj">Új hely felvitele</a></p>
<?php endif; ?>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Hely neve</th>
        <th>Műveletek</th>
    </tr>

    <?php foreach ($viewData['lista'] as $sor): ?>
        <tr>
            <td><?= $sor['az'] ?></td>
            <td><?= $sor['helynev'] ?></td>

            <td>
                <?php if ($_SESSION['jog'] !== 'user'): ?>
                    <a href="index.php?hely/modositas/<?= $sor['az'] ?>">Módosítás</a>
                <?php endif; ?>

                <?php if ($_SESSION['jog'] === 'admin'): ?>
                    | <a href="index.php?hely/torles/<?= $sor['az'] ?>">Törlés</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
