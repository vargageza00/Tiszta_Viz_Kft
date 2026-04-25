<h2>Regisztráció</h2>

<form action="<?= SITE_ROOT ?>regisztracio" method="post">
    <label>Családi név:</label>
    <input type="text" name="lastname" required><br>

    <label>Utónév:</label>
    <input type="text" name="firstname" required><br>

    <label>Felhasználónév:</label>
    <input type="text" name="login" required><br>

    <label>Jelszó:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Regisztráció">
</form>

<h3><?= isset($viewData['uzenet']) ? $viewData['uzenet'] : "" ?></h3>
