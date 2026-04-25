<?php

class Error_Controller
{
	public $baseName = 'error';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$view = new View_Loader($this->baseName.'_main');
		$view->assign('type', $vars[0]);
		$view->assign('message', $vars[1]);
	}
}

?>