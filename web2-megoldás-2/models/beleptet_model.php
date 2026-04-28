<?php

class Beleptet_Model
{
    public function get_data($vars)
    {
        $retData = ['eredmeny' => ''];

        try {
            $connection = Database::getConnection();

            // BIZTONSÁGOS SQL – prepared statement
            $sql = "SELECT id, csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag 
                    FROM felhasznalok 
                    WHERE bejelentkezes = ?";

            $stmt = $connection->prepare($sql);
            $stmt->execute([$vars['login']]);
            $felhasznalo = $stmt->fetch(PDO::FETCH_ASSOC);

            // Nincs ilyen felhasználó
            if (!$felhasznalo) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Helytelen felhasználónév vagy jelszó!";
                return $retData;
            }

            // Jelszó ellenőrzése
            if (!password_verify($vars['password'], $felhasznalo['jelszo'])) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Helytelen felhasználónév vagy jelszó!";
                return $retData;
            }

            // Sikeres bejelentkezés → SESSION beállítása
            $_SESSION['userid']        = $felhasznalo['id'];
            $_SESSION['userlastname']  = $felhasznalo['csaladi_nev'];
            $_SESSION['userfirstname'] = $felhasznalo['utonev'];
            $_SESSION['loginname']     = $felhasznalo['bejelentkezes'];
            $_SESSION['userlevel']     = $felhasznalo['jogosultsag'];
            $_SESSION['admin'] = $felhasznalo[0]['admin'];

            // Menü frissítése
            Menu::setMenu();

            // Üzenet
            $retData['eredmeny'] = "OK";
            $retData['uzenet'] =
                "Kedves ".$felhasznalo['csaladi_nev']." ".$felhasznalo['utonev']."!<br><br>
                 Jó munkát kívánunk rendszerünkkel.<br><br>
                 Az üzemeltetők";

        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }

        return $retData;
    }
}

?>
