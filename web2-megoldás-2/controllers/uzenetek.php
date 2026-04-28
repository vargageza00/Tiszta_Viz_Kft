<?php

class Uzenetek_Controller
{
    public $baseName = 'uzenetek';

    public function main(array $vars)
    {
        // Csak admin láthatja
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
            header("Location: " . SITE_ROOT . "beleptet");
            exit;
        }

        $model = new Uzenetek_Model();
        $data['uzenetek'] = $model->getAll();

        $view = new View_Loader("uzenetek_main");
        foreach ($data as $key => $value) {
            $view->assign($key, $value);
        }
    }
}

?>