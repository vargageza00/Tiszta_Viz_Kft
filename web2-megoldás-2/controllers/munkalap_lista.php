<?php

class Munkalap_Lista_Controller
{
    public $baseName = 'munkalap_lista';

    public function main($vars)
    {
        // jogosultság
        if (!isset($_SESSION['userid']) && !isset($_SESSION['szereloaz'])) {
            die("Nincs jogosultság.");
        }

        include_once(SERVER_ROOT.'models/munkalap_model.php');
        $model = new Munkalap_Model();
        $viewData = $model->lista();

        $view = new View_Loader($this->baseName.'_main');
        foreach ($viewData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
