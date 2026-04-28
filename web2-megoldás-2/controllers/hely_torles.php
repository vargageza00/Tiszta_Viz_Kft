<?php

class Hely_Torles_Controller
{
    public $baseName = 'hely_torles';

    public function main($vars)
    {
        // Jogosultság: csak admin
        if ($_SESSION['jog'] !== 'admin') {
            die("Nincs jogosultság a törléshez.");
        }

        $id = $vars[0];

        include_once(SERVER_ROOT.'models/hely_model.php');
        $model = new Hely_Model();
        $model->torles($id);

        header("Location: index.php?hely/lista");
    }
}

?>
