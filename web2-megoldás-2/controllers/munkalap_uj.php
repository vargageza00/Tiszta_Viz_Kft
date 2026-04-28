<?php

class Munkalap_uj_Controller
{
    public $baseName = 'munkalap_uj';

    public function main($vars)
    {   include_once(SERVER_ROOT.'models/munkalap_model.php');
        $model = new Munkalap_Model();

        // Csak POST esetén mentsen
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $retData = $model->uj($vars);
        } else {
            $retData = [];
        }

        // View betöltése
        $view = new View_Loader($this->baseName.'_main');

        // Üzenet átadása
        foreach($retData as $name => $value) {
            $view->assign($name, $value);
        }
    }
}

?>
