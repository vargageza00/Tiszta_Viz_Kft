<?php

class Felhasznalok_Model
{
	public function get_data()
	{
		$retData['eredmeny'] = "OK";
		$retData['rows'] = Array();
		
		try {
			$connection = Database::getConnection();
			$sql = "select id, csaladi_nev, utonev, bejelentkezes, jogosultsag from felhasznalok order by id";
			$stmt = $connection->query($sql);
			$retData['rows'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			$retData['eredmeny'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba:<br>".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>