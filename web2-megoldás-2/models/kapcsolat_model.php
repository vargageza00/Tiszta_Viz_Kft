<?php

class Kapcsolat_Model
{
    public function mentes($nev, $email, $uzenet)
    {
        $connection = Database::getConnection();

        $sql = "INSERT INTO uzenetek (nev, email, uzenet, kuldes_ido)
                VALUES (:nev, :email, :uzenet, NOW())";

        $stmt = $connection->prepare($sql);
        $stmt->execute([
            ':nev' => $nev,
            ':email' => $email,
            ':uzenet' => $uzenet
        ]);

        return ['uzenet' => 'Üzenet sikeresen elküldve!'];
    }
}

?>
