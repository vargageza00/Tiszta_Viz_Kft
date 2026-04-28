<h2>Szerelő regisztráció</h2>

<?php if (!empty($viewData['uzenet'])): ?>
    <p><?= $viewData['uzenet'] ?></p>
<?php endif; ?>

<form method="post">

    Vezetéknév: <br>
    <input type="text" name="vezeteknev" required><br><br>

    Keresztnév: <br>
    <input type="text" name="keresztnev" required><br><br>

    Email: <br>
    <input type="email" name="email" required><br><br>

    Bejelentkezési név: <br>
    <input type="text" name="bejelentkezes" required><br><br>

    Jelszó: <br>
    <input type="password" name="jelszo" required><br><br>

    Jelszó ismét: <br>
    <input type="password" name="jelszo2" required><br><br>

    <input type="submit" value="Regisztráció">

</form>
