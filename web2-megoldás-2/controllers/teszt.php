<?php


class Teszt_Controller
{
	public $baseName = 'teszt';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		include_once(SERVER_ROOT.'models/view_loader.php');
		$file = SERVER_ROOT.'models/teszt_model.php'; 
		if(file_exists($file))
		{
			include_once($file);
			$class = 'Teszt_Model';
			if(class_exists($class))
			{
				$testModel = new Teszt_Model;  //az osztályhoz tartozó modell
				if(isset($vars[0]))
				{
					//modellbõl lekérdezzük a kért adatot
					$reqData = $testModel->get_data($vars[0]);
				}
				else
				{
					$reqData['title'] = "Válasszon:";
					$reqData['content'] = array("mvc", "new");
				}	
				//betöltjük a nézetet
				$view = new View_Loader($this->baseName.'_main');
				//átadjuk a lekérdezett adatokat a nézetnek
				$view->assign('title', $reqData['title']);
				$view->assign('content', $reqData['content']);
			}
			else
			{
				//betöltjük az error nézetet
				$view = new View_Loader('error_main');
				//átadjuk a hiba informacioit a nézetnek
				$view->assign('type', "A teszthez tartozó modell főosztálya nem található");
				$view->assign('message', "Incomplete page <strong>".$this->baseName."</strong>");
			}
		}
		else
		{
			//betöltjük az error nézetet
			$view = new View_Loader('error_main');
			//átadjuk a hiba informacioit a nézetnek
			$view->assign('type', "A teszthez tartozó modell állomány nem található");
			$view->assign('message', "Hiányos oldal <strong>".$this->baseName."</strong>");
		}
	}
}

?>