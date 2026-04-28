<?php

class Munkalap_torles_Controller
{
    public $baseName = 'munkalap_torles';

    public function main($vars)
    {
        if (!isset($_SESSION['jog']) || !in_array($_SESSION['jog'], ['999'])) {
        header("Location: index.php?hiba&uzenet=Nincs jogosultság a törléshez");
        exit;
    }
        include_once(SERVER_ROOT.'models/munkalap_model.php');
        $model = new Munkalap_Model();

        // A router az id-t a 0. indexben adja át
        if (!isset($vars[0]) || empty($vars[0])) {
            $retData = [
                'eredmeny' => 'ERROR',
                'uzenet' => 'Hiányzó munkalap azonosító.'
            ];
        } else {
            $id = $vars[0];
            $retData = $model->torol($id);
        }

        $view = new View_Loader($this->baseName.'_main');

        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
