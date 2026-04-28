<?php

class Kapcsolat_Controller
{
    public $baseName = 'kapcsolat';

    public function main(array $vars)
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nev = trim($_POST['nev'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $uzenet = trim($_POST['uzenet'] ?? '');

            if (strlen($nev) < 3) {
                $data['uzenet'] = "A név túl rövid.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['uzenet'] = "Az email nem érvényes.";
            } elseif (strlen($uzenet) < 5) {
                $data['uzenet'] = "Az üzenet túl rövid.";
            } else {

                // *** A TE MVC-D ÍGY KEZELI A DB-T ***
                $connection = Database::getConnection();

                $sql = "INSERT INTO uzenetek (nev, email, uzenet, kuldes_ido)
                        VALUES (:nev, :email, :uzenet, NOW())";

                $stmt = $connection->prepare($sql);
                $stmt->execute([
                    ':nev' => $nev,
                    ':email' => $email,
                    ':uzenet' => $uzenet
                ]);

                $data['uzenet'] = "Üzenet sikeresen elküldve!";
            }
        }

        $view = new View_Loader("kapcsolat_main");
        foreach ($data as $key => $value) {
            $view->assign($key, $value);
        }
    }
}

?>
