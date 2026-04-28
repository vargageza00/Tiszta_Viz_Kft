<?php

class Szerelo_Model
{
    public function lista()
    {
        $connection = Database::getConnection();
        $sql = "SELECT az, vezeteknev, keresztnev FROM szerelo ORDER BY vezeteknev, keresztnev";
        $stmt = $connection->query($sql);

        return ['lista' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    }
}

?>
