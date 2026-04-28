<?php

class Hely_Controller
{
    public $baseName = 'hely';

    public function main($vars)
    {
        header("Location: index.php?hely/lista");
    }
}

?>
