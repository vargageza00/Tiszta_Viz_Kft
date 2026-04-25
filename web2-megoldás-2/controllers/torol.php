<?php

class Torol_Controller
{
	public $baseName = 'torol';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		include_once(SERVER_ROOT.'models/torol_model.php');
		$torolModel = new Torol_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $torolModel->get_data($vars);
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>