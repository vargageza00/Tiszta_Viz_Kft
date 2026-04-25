<?php

class Kepek_Model
{
    public function upload($files)
    {
        $retData = [];

        if (!isset($files['kep']) || $files['kep']['error'] !== UPLOAD_ERR_OK) {
            $retData['uzenet'] = "Nem sikerült a fájl feltöltése!";
            return $retData;
        }

        $file = $files['kep'];

        // 1) Méret ellenőrzése (max 2MB)
        if ($file['size'] > 2 * 1024 * 1024) {
            $retData['uzenet'] = "A fájl túl nagy! Maximum 2MB lehet.";
            return $retData;
        }

        // 2) Típus ellenőrzése
        $allowed = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowed)) {
            $retData['uzenet'] = "Csak JPG, PNG vagy GIF fájl tölthető fel!";
            return $retData;
        }

        // 3) Cél mappa
        $targetDir = SERVER_ROOT . "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // 4) Új fájlnév
        $newName = time() . "_" . basename($file['name']);
        $targetPath = $targetDir . $newName;

        // 5) Fájl mozgatása
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $retData['uzenet'] = "A kép sikeresen feltöltve!";
        } else {
            $retData['uzenet'] = "Hiba történt a fájl mentése közben!";
        }

        return $retData;
    }

    public function listImages()
{
    $retData = [];

    $dir = SERVER_ROOT . "uploads/";
    $files = [];

    if (is_dir($dir)) {
        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            if ($file !== "." && $file !== "..") {
                $files[] = $file;
            }
        }
        closedir($handle);
    }

    $retData['kepek'] = $files;
    return $retData;
}

}
?>
