<?php

class Munkalap_Model
{
    public function getLista()
    {
        $retData = [];

        try {
            $connection = Database::getConnection();
            $sql = "SELECT * FROM munkalap ORDER BY bedatum DESC";
            $stmt = $connection->query($sql);
            $retData['lista'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $retData['lista'] = [];
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }

        return $retData;
    }

    public function getOne($id)
    {
        $retData = [];

        try {
            $connection = Database::getConnection();
            $sql = "SELECT * FROM munkalap WHERE id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id]);
            $retData['adat'] = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $retData['adat'] = null;
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }

        return $retData;
    }

    public function uj($vars)
    {
        try {
            $connection = Database::getConnection();
            $sql = "INSERT INTO munkalap (bedatum, javdatum, munkaora, helyaz, szereloaz, anyagar)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                $vars['bedatum'],
                $vars['javdatum'],
                $vars['munkaora'],
                $vars['helyaz'],
                $vars['szereloaz'],
                $vars['anyagar']
            ]);

            return [
                'eredmeny' => 'OK',
                'uzenet' => 'A munkalap sikeresen létrejött.'
            ];

        } catch (PDOException $e) {
            return [
                'eredmeny' => 'ERROR',
                'uzenet' => "Adatbázis hiba: " . $e->getMessage()
            ];
        }
    }

    public function modosit($vars)
    {
        try {
            $connection = Database::getConnection();
            $sql = "UPDATE munkalap SET
                        bedatum = ?, javdatum = ?, munkaora = ?, helyaz = ?, szereloaz = ?, anyagar = ?
                    WHERE id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                $vars['bedatum'],
                $vars['javdatum'],
                $vars['munkaora'],
                $vars['helyaz'],
                $vars['szereloaz'],
                $vars['anyagar'],
                $vars['id']
            ]);

            return [
                'eredmeny' => 'OK',
                'uzenet' => 'A munkalap sikeresen módosítva.'
            ];

        } catch (PDOException $e) {
            return [
                'eredmeny' => 'ERROR',
                'uzenet' => "Adatbázis hiba: " . $e->getMessage()
            ];
        }
    }

    public function torol($id)
    {
        try {
            $connection = Database::getConnection();
            $sql = "DELETE FROM munkalap WHERE id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id]);

            return [
                'eredmeny' => 'OK',
                'uzenet' => 'A munkalap törölve.'
            ];

        } catch (PDOException $e) {
            return [
                'eredmeny' => 'ERROR',
                'uzenet' => "Adatbázis hiba: " . $e->getMessage()
            ];
        }
    }

    public function getHelyek()
    {
        $connection = Database::getConnection();
        $sql = "SELECT az, telepules, utca FROM hely ORDER BY telepules, utca";
        $stmt = $connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSzerelok()
    {
        $connection = Database::getConnection();
        $sql = "SELECT az, vezeteknev, keresztnev FROM szerelo ORDER BY vezeteknev";
        $stmt = $connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
