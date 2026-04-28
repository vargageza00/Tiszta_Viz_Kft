<h2>Kapcsolat</h2>

<?php if (isset($uzenet)): ?>
    <p style="color: green; font-weight: bold;"><?= $uzenet ?></p>
<?php endif; ?>

<form method="POST" id="kapcsolatForm">
    <label>Név:</label>
    <input type="text" name="nev">

    <label>Email:</label>
    <input type="text" name="email">

    <label>Üzenet:</label>
    <textarea name="uzenet"></textarea>

    <button type="submit">Küldés</button>
</form>

<div id="hiba"></div>

<script>
// Kliens oldali ellenőrzés
document.getElementById('kapcsolatForm').addEventListener('submit', function(e) {
    let nev = this.nev.value.trim();
    let email = this.email.value.trim();
    let uzenet = this.uzenet.value.trim();

    let hibak = [];

    if (nev.length < 3) hibak.push("A név túl rövid.");
    if (!email.includes("@")) hibak.push("Az email nem érvényes.");
    if (uzenet.length < 5) hibak.push("Az üzenet túl rövid.");

    if (hibak.length > 0) {
        e.preventDefault();
        document.getElementById('hiba').innerHTML = hibak.join("<br>");
    }
});
</script>
