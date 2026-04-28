<?php

class Felhasznalo_regisztracio_Controller
{
    public $baseName = 'felhasznalo_regisztracio';

    public function main(array $vars)
    {
        include_once(SERVER_ROOT.'models/felhasznalo_regisztracio_model.php');
        $model = new Regisztracio_Model;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $retData = $model->register($vars);
        }

        $view = new View_Loader($this->baseName.'_main');

        if (isset($retData)) {
            foreach($retData as $name => $value)
                $view->assign($name, $value);
        }
    }
}
?>
