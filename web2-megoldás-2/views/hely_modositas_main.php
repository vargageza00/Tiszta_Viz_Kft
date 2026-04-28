<h2>Hely módosítása</h2>

<form method="POST">
    <label>Hely neve:</label><br>
    <input type="text" name="helynev" value="<?= $viewData['adat']['helynev'] ?>" required><br><br>

    <button type="submit">Mentés</button>
</form>

<?php if (isset($viewData['uzenet'])): ?>
    <p style="color:green;"><?= $viewData['uzenet'] ?></p>
<?php endif; ?>
