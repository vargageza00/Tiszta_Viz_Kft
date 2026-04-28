<?php

class Hely_Model
{
    public function lista()
    {
        $connection = Database::getConnection();
        $sql = "SELECT * FROM hely ORDER BY az ASC";
        $stmt = $connection->query($sql);

        return ['lista' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    }

    public function uj($vars)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return [];
        }

        $connection = Database::getConnection();
        $sql = "INSERT INTO hely (helynev) VALUES (?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$vars['helynev']]);

        return ['uzenet' => 'Hely sikeresen felvéve!'];
    }

    public function modositas($id, $vars)
    {
        $connection = Database::getConnection();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $sql = "SELECT * FROM hely WHERE az = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id]);
            return ['adat' => $stmt->fetch(PDO::FETCH_ASSOC)];
        }

        $sql = "UPDATE hely SET helynev = ? WHERE az = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$vars['helynev'], $id]);

        return ['uzenet' => 'Hely módosítva!'];
    }

    public function torles($id)
    {
        $connection = Database::getConnection();
        $sql = "DELETE FROM hely WHERE az = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>
