<?php
class Uzenetek_Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM uzenetek ORDER BY kuldes_ido DESC";
        return DB::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>