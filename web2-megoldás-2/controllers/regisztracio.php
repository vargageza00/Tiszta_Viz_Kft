<?php

class Regisztracio_Controller
{
    public $baseName = 'regisztracio';

    public function main($vars)
    {
        $view = new View_Loader($this->baseName.'_main');
    }
}

?>
