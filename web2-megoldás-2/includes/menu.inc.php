<?php

class Menu
{
    public static $menu = array();

    // Menü betöltése adatbázisból
    public static function setMenu() {
        self::$menu = array();
        $connection = Database::getConnection();
       if (isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {

    // ADMIN
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        $stmt = $connection->query(
            "SELECT url, nev, szulo, jogosultsag 
             FROM menu 
             WHERE jogosultsag IN ('000', '111', '999')
             ORDER BY sorrend"
        );
    }
    // SIMA FELHASZNÁLÓ
    else {
        $stmt = $connection->query(
            "SELECT url, nev, szulo, jogosultsag 
             FROM menu 
             WHERE jogosultsag IN ('000', '111')
             ORDER BY sorrend"
        );
    }

}
// NINCS BEJELENTKEZVE
else {
    $stmt = $connection->query(
        "SELECT url, nev, szulo, jogosultsag 
         FROM menu 
         WHERE jogosultsag = '000'
         ORDER BY sorrend"
    );
}

        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['url']] = array(
                $menuitem['nev'], 
                $menuitem['szulo'], 
                $menuitem['jogosultsag']
            );
        }
    }

    // Menü HTML kiírása
    public static function getMenu() {
        echo '<ul>';
        foreach(self::$menu as $url => $menuItem) {
            echo '<li><a href="'.SITE_ROOT.$url.'">'.$menuItem[0].'</a></li>';
        }
        echo '</ul>';
    }
}
Menu::setMenu();

?>
