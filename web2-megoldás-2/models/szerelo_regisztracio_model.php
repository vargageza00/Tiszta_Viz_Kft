<?php

class Szerelo_regisztracio_Model
{
    public function regisztral($vars)
    {
        $retData = [];

        // 1) Validáció
        if (empty($vars['vezeteknev']) ||
            empty($vars['keresztnev']) ||
            empty($vars['bejelentkezes']) ||
            empty($vars['jelszo']) ||
            empty($vars['jelszo2'])) {

            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Minden mező kitöltése kötelező!";
            return $retData;
        }

        if ($vars['jelszo'] !== $vars['jelszo2']) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "A két jelszó nem egyezik!";
            return $retData;
        }

        try {
            $connection = Database::getConnection();

            // 2) Ellenőrizzük, hogy a bejelentkezés név foglalt-e
            $sql = "SELECT az FROM szerelo WHERE bejelentkezes = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$vars['bejelentkezes']]);

            if ($stmt->fetch()) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Ez a bejelentkezési név már foglalt!";
                return $retData;
            }

            // 3) Jelszó hash
            $hash = password_hash($vars['jelszo'], PASSWORD_DEFAULT);

            // 4) Mentés
            $sql = "INSERT INTO szerelo (vezeteknev, keresztnev, bejelentkezes, jelszo)
                    VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                $vars['vezeteknev'],
                $vars['keresztnev'],
                $vars['bejelentkezes'],
                $hash
            ]);

            $retData['eredmeny'] = "OK";
            $retData['uzenet'] = "Sikeres regisztráció! Most már bejelentkezhetsz.";

        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }

        return $retData;
    }
}

?>
