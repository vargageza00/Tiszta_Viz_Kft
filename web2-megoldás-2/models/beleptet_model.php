<?php

class Beleptet_Model
{
    public function get_data($vars)
    {
        $retData = ['eredmeny' => ''];

        try {
            $connection = Database::getConnection();

            // 1) FELHASZNÁLÓK TÁBLA ELLENŐRZÉSE
            $sql = "SELECT id, csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag 
                    FROM felhasznalok 
                    WHERE bejelentkezes = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$vars['login']]);
            $felhasznalo = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($felhasznalo) {

                if (!password_verify($vars['password'], $felhasznalo['jelszo'])) {
                    $retData['eredmeny'] = "ERROR";
                    $retData['uzenet'] = "Helytelen felhasználónév vagy jelszó!";
                    return $retData;
                }

                // FELHASZNÁLÓ / ADMIN BELÉPTETÉSE
                $_SESSION['userid']        = $felhasznalo['id'];
                $_SESSION['userlastname']  = $felhasznalo['csaladi_nev'];
                $_SESSION['userfirstname'] = $felhasznalo['utonev'];
                $_SESSION['loginname']     = $felhasznalo['bejelentkezes'];
                $_SESSION['jog']           = $felhasznalo['jogosultsag']; // user vagy admin
                
               
                Menu::setMenu();

                $retData['eredmeny'] = "OK";
                $retData['uzenet'] =
                    "Kedves ".$felhasznalo['csaladi_nev']." ".$felhasznalo['utonev']."!<br><br>
                     Jó munkát kívánunk rendszerünkkel.<br><br>
                     Az üzemeltetők";

                return $retData;
            }

            // 2) SZERELŐ TÁBLA ELLENŐRZÉSE
            $sql = "SELECT az, vezeteknev, keresztnev, bejelentkezes, jelszo 
                    FROM szerelo 
                    WHERE bejelentkezes = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$vars['login']]);
            $szerelo = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($szerelo) {

                if (!password_verify($vars['password'], $szerelo['jelszo'])) {
                    $retData['eredmeny'] = "ERROR";
                    $retData['uzenet'] = "Helytelen felhasználónév vagy jelszó!";
                    return $retData;
                }

                // SZERELŐ BELÉPTETÉSE
                $_SESSION['userid']        = $szerelo['az'];
                $_SESSION['szereloaz']     = $szerelo['az'];
                $_SESSION['userlastname']  = $szerelo['vezeteknev'];
                $_SESSION['userfirstname'] = $szerelo['keresztnev'];
                $_SESSION['loginname']     = $szerelo['bejelentkezes'];
                $_SESSION['jog']           = 'szerelo';

                Menu::setMenu();

                $retData['eredmeny'] = "OK";
                $retData['uzenet'] =
                    "Kedves ".$szerelo['vezeteknev']." ".$szerelo['keresztnev']."!<br><br>
                     Jó munkát kívánunk rendszerünkkel.<br><br>
                     Az üzemeltetők";

                return $retData;
            }

            // 3) HA SEHOL NINCS
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Helytelen felhasználónév vagy jelszó!";
            return $retData;

        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
            return $retData;
        }
    }
}


?>
