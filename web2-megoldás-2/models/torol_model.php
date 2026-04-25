<?php

class Torol_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "delete from felhasznalok where id=".$vars['rowid'];
			$count = $connection->exec($sql);
			switch($count) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Hiba: Nem létezik a felhasználó!";
					break;
				case 1:
					$retData['eredmeny'] = "OK";
					$retData['uzenet'] = "A {$vars['rowid']} számú felhasználó törölve!";
					break;
			}
		}
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba:<br>".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>