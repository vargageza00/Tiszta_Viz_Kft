<?php

class Hely_Modositas_Controller
{
    public $baseName = 'hely_modositas';

    public function main($vars)
    {
        // Jogosultság: szerelő + admin
        if ($_SESSION['jog'] !== 'admin' && $_SESSION['jog'] !== 'szerelo') {
            die("Nincs jogosultság a módosításhoz.");
        }

        $id = $vars[0];

        include_once(SERVER_ROOT.'models/hely_model.php');
        $model = new Hely_Model();
        $viewData = $model->modositas($id, $vars);

        $view = new View_Loader($this->baseName.'_main');
        foreach ($viewData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
