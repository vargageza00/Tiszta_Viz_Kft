<?php

class Munkalap_modositas_Controller
{
    public $baseName = 'munkalap_modositas';

    public function main($vars)
    {
        if (!isset($_SESSION['jog']) || !in_array($_SESSION['jog'], ['999', 'szerelo'])) {
        header("Location: index.php?hiba&uzenet=Nincs jogosultság a törléshez");
        exit;
        }
        include_once(SERVER_ROOT.'models/munkalap_model.php');
        $model = new Munkalap_Model();

        // 1) ID meghatározása
        $id = $_POST['id'] ?? $vars[0] ?? null;

        if (!$id) {
            die("Hiányzó ID a módosításhoz.");
        }

        // 2) Ha POST → módosítás
        if ($_POST) {
            $model->modosit($_POST);
            $retData = $model->getOne($id);
            $retData['uzenet'] = "Sikeres módosítás.";
        }
        else {
            // 3) Első megnyitáskor
            $retData = $model->getOne($id);
        }
        $retData['helyek'] = $model->getHelyek();
        $retData['szerelok'] = $model->getSzerelok();

        // 4) View betöltése
        $view = new View_Loader($this->baseName.'_main');

        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>
