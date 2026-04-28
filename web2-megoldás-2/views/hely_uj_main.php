<h2>Új hely felvitele</h2>

<form method="POST">
    <label>Hely neve:</label><br>
    <input type="text" name="helynev" required><br><br>

    <button type="submit">Mentés</button>
</form>

<?php if (isset($viewData['uzenet'])): ?>
    <p style="color:green;"><?= $viewData['uzenet'] ?></p>
<?php endif; ?>
