<?php

class Hely_Lista_Controller
{
    public $baseName = 'hely_lista';

    public function main($vars)
    {
        // Jogosultság: minden bejelentkezett user
        if (!isset($_SESSION['userid']) && !isset($_SESSION['szereloaz'])) {
            die("Nincs jogosultság.");
        }

        include_once(SERVER_ROOT.'models/hely_model.php');
        $model = new Hely_Model();
        $viewData = $model->lista();

        $view = new View_Loader($this->baseName.'_main');
        foreach ($viewData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
