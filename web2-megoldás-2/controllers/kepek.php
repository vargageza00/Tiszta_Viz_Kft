<?php
class Kepek_Controller
{
    public $baseName = 'kepek';

    public function main(array $vars)
    {
        include_once(SERVER_ROOT.'models/kepek_model.php');
        $model = new Kepek_Model;

        $data = [];

        // Feltöltés
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $model->upload($_FILES);
        }

        // Képek listázása
        $listData = $model->listImages();

        // A listázás eredményét is hozzáadjuk
        $data = array_merge($data, $listData);

        // View betöltése — MOST már csak itt!
        $view = new View_Loader($this->baseName.'_main');

        // MINDEN adat átadása
        foreach($data as $name => $value) {
            $view->assign($name, $value);
        }
        unset($view);
    }
    
}


?>
