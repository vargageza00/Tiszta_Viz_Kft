<?php

class Munkalap_Controller
{
    public $baseName = 'munkalap';

    public function main($vars)
    {
        include_once(SERVER_ROOT.'models/munkalap_model.php');
        $model = new Munkalap_Model();

        $retData = $model->getLista();

        $view = new View_Loader($this->baseName.'_main');

        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
