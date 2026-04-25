<?php

class Felhasznalok_Controller
{
	public $baseName = 'felhasznalok';
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		include_once(SERVER_ROOT.'models/felhasznalok_model.php');
		$felhasznalokModel = new Felhasznalok_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $felhasznalokModel->get_data(); 
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName."_main");
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>