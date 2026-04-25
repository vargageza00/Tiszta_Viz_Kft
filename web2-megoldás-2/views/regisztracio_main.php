<h2>Regisztráció</h2>

<form action="<?= SITE_ROOT ?>regisztracio" method="post" class="form-box">

    <label>Családi név:</label>
    <input type="text" name="lastname" required>

    <label>Utónév:</label>
    <input type="text" name="firstname" required>

    <label>Felhasználónév:</label>
    <input type="text" name="login" required pattern=".{3,}" oninvalid="this.setCustomValidity('A felhasználónévnek legalább 3 karakter hosszúnak kell lennie.')"
       oninput="this.setCustomValidity('')">

    <label>Email cím:</label>
    <input type="email" name="email" required>

    <label>Jelszó:</label>
    <input type="password" name="password" required pattern=".{4,}" oninvalid="this.setCustomValidity('A jelszónak legalább 4 karakter hosszúnak kell lennie.')"
       oninput="this.setCustomValidity('')">

    <label>Jelszó ismét:</label>
    <input type="password" name="password2" required pattern=".{4,}" oninvalid="this.setCustomValidity('A jelszónak legalább 4 karakter hosszúnak kell lennie.')"
       oninput="this.setCustomValidity('')">

    <input type="submit" value="Regisztráció">
</form>

<?php if (isset($viewData['uzenet'])): ?>
    <div class="msg-box"><?= $viewData['uzenet'] ?></div>
<?php endif; ?>
