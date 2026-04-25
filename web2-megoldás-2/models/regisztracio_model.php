<?php

class Regisztracio_Model
{
    public function register($vars)
    {
        $retData = [];

        try {
            $connection = Database::getConnection();

            // Ellenőrzés: létezik-e már a login
            $stmt = $connection->prepare("SELECT id FROM felhasznalok WHERE bejelentkezes = ?");
            $stmt->execute([$vars['login']]);

            if ($stmt->rowCount() > 0) {
                $retData['uzenet'] = "Ez a felhasználónév már foglalt!";
                return $retData;
            }

            // Új felhasználó beszúrása
            $sql = "INSERT INTO felhasznalok (csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag)
                    VALUES (?, ?, ?, ?, '111')";

            $stmt = $connection->prepare($sql);
            $stmt->execute([
                $vars['lastname'],
                $vars['firstname'],
                $vars['login'],
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
