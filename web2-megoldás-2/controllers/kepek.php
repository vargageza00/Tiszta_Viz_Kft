<?php
class Kepek_Controller
{
    public $baseName = 'kepek';

public function main(array $vars)
{
    //session_start();
    include_once(SERVER_ROOT.'models/kepek_model.php');
    $model = new Kepek_Model;

    $data = [];
    $isLoggedIn = isset($_SESSION['userid']) && $_SESSION['userid'] > 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // TÖRLÉS
        if (isset($_POST['torol'])) {
            if ($isLoggedIn) {
                $data = $model->deleteImage($_POST['torol']);
            } else {
                $data['uzenet'] = "A törléshez be kell jelentkezni!";
            }
        }

        // FELTÖLTÉS
        elseif (isset($_FILES['kep'])) {
            if ($isLoggedIn) {
                $data = $model->upload($_FILES);
            } else {
                $data['uzenet'] = "A feltöltéshez be kell jelentkezni!";
            }
        }
    }

    // Képek listázása
    $listData = $model->listImages();
    $data = array_merge($data, $listData);

    // View betöltése
    $view = new View_Loader($this->baseName.'_main');

    foreach($data as $name => $value) {
        $view->assign($name, $value);
    }
    unset($view);
}

    
}


?>
