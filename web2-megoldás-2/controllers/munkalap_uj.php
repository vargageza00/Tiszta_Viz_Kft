<?php

class Munkalap_uj_Controller
{
    public $baseName = 'munkalap_uj';

    public function main($vars)
    {
        include_once(SERVER_ROOT.'models/munkalap_model.php');
        include_once(SERVER_ROOT.'models/hely_model.php');
        include_once(SERVER_ROOT.'models/szerelo_model.php');

        $model = new Munkalap_Model();
        $helyModel = new Hely_Model();
        $szereloModel = new Szerelo_Model();

        // Csak POST esetén mentsen
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $retData = $model->uj($vars);
        } else {
            $retData = [];
        }

        // View betöltése
        $view = new View_Loader($this->baseName.'_main');

        // Helyek és szerelők listája
        $view->assign('helyek', $helyModel->lista()['lista']);
        $view->assign('szerelok', $szereloModel->lista()['lista']);

        // Üzenet átadása
        foreach($retData as $name => $value) {
            $view->assign($name, $value);
        }
    }
}

?>
