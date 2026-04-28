<?php
class Regisztracio_Model
{
    public function register($vars)
    {
        $retData = [];

        // 1) Jelszó egyezés ellenőrzése
        if ($vars['password'] !== $vars['password2']) {
            $retData['uzenet'] = "A két jelszó nem egyezik!";
            return $retData;
        }

        try {
            $connection = Database::getConnection();

            // 2) Felhasználónév ellenőrzése
            $stmt = $connection->prepare("SELECT id FROM felhasznalok WHERE bejelentkezes = ?");
            $stmt->execute([$vars['login']]);

            if ($stmt->rowCount() > 0) {
                $retData['uzenet'] = "Ez a felhasználónév már foglalt!";
                return $retData;
            }

            // 3) Email ellenőrzése
            $stmt = $connection->prepare("SELECT id FROM felhasznalok WHERE email = ?");
            $stmt->execute([$vars['email']]);

            if ($stmt->rowCount() > 0) {
                $retData['uzenet'] = "Ez az email cím már regisztrálva van!";
                return $retData;
            }

            // 4) Új felhasználó beszúrása
            $sql = "INSERT INTO felhasznalok 
                    (csaladi_nev, utonev, bejelentkezes, email, jelszo, jogosultsag)
                    VALUES (?, ?, ?, ?, ?, '111')";

            $stmt = $connection->prepare($sql);
            $stmt->execute([
                $vars['lastname'],
                $vars['firstname'],
                $vars['login'],
                $vars['email'],
                password_hash($vars['password'], PASSWORD_DEFAULT)
            ]);

            $retData['uzenet'] = "Sikeres regisztráció! Most már bejelentkezhet.";
        }
        catch (PDOException $e) {
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage();
        }

        return $retData;
    }
}

?>