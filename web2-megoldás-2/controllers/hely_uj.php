<?php

class Hely_Uj_Controller
{
    public $baseName = 'hely_uj';

    public function main($vars)
    {
        // Jogosultság: szerelő + admin
        if ($_SESSION['jog'] !== 'admin' && $_SESSION['jog'] !== 'szerelo') {
            die("Nincs jogosultság új hely felviteléhez.");
        }

        include_once(SERVER_ROOT.'models/hely_model.php');
        $model = new Hely_Model();
        $viewData = $model->uj($vars);

        $view = new View_Loader($this->baseName.'_main');
        foreach ($viewData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
