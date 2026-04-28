<?php

class Szerelo_regisztracio_Controller
{
    public $baseName = 'szerelo_regisztracio';

    public function main($vars)
    {
        include_once(SERVER_ROOT.'models/szerelo_regisztracio_model.php');
        $model = new Szerelo_regisztracio_Model();

        if ($_POST) {
            $retData = $model->regisztral($_POST);
        } else {
            $retData = [];
        }

        $view = new View_Loader($this->baseName.'_main');

        foreach ($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
