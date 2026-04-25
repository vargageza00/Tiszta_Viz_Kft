<?php

class Menu
{
    public static $menu = array();

    // Menü betöltése adatbázisból
    public static function setMenu() {
        self::$menu = array();
        $connection = Database::getConnection();

        // Ha be van jelentkezve → 000 + 111 menüpontok
        if (isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
            $stmt = $connection->query(
                "SELECT url, nev, szulo, jogosultsag 
                 FROM menu 
                 WHERE jogosultsag IN ('000', '111')
                 ORDER BY sorrend"
            );
        } 
        // Ha nincs bejelentkezve → csak 000 menüpontok
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
