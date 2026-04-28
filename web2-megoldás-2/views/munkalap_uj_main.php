<h2>Új munkalap</h2>
<?php if (!empty($uzenet)): ?>
    <div style="padding:10px; background:#c7ffc7; border:1px solid #4caf50; margin-bottom:15px;">
        <?= $uzenet ?>
    </div>
<?php endif; ?>
<form method="post">
    Beadás dátuma: <input type="date" name="bedatum"><br><br>
    Javítás dátuma: <input type="date" name="javdatum"><br><br>
    Munkaóra: <input type="number" name="munkaora"><br><br>
    Hely AZ: <input type="number" name="helyaz"><br><br>
    Szerelő AZ: <input type="number" name="szereloaz"><br><br>
    Anyagár: <input type="number" name="anyagar"><br><br>

    <input type="submit" value="Mentés">
</form>
