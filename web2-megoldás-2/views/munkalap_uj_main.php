<h2>Új munkalap</h2>
<?php if (!empty($uzenet)): ?>
    <div style="padding:10px; background:#c7ffc7; border:1px solid #4caf50; margin-bottom:15px;">
        <?= $uzenet ?>
    </div>
<?php endif; ?>
<form method="post">
    <br><br>
    <label>Beadás dátuma:</label><input type="date" name="bedatum"><br><br>
    <label>Javítás dátuma:</label><input type="date" name="javdatum"><br><br>
    <label>Munkaóra: </label><input type="number" name="munkaora"><br><br>
    <label>Anyagár:</label><input type="number" name="anyagar"><br><br>
    <div class="form-row">
    <label>Hely:</label>
    <select name="helyaz" class="form-select">
        <?php foreach ($viewData['helyek'] as $hely): ?>
            <option value="<?= $hely['az'] ?>">
                <?= $hely['telepules'] . ' ' . $hely['utca'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    </div>
    
    <div class="form-row">
    <label>Szerelő:</label>
    <select name="szereloaz" class="form-select">
        <?php foreach ($viewData['szerelok'] as $sz): ?>
            <option value="<?= $sz['az'] ?>">
                <?= $sz['vezeteknev'] . ' ' . $sz['keresztnev'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    </div>
    
    

    <input type="submit" value="Mentés">
</form>
