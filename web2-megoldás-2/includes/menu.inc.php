<?php

Class Menu {
    public static $menu = array();
    
    public static function setMenu() {
    self::$menu = array();
    $connection = Database::getConnection();

    if ($_SESSION['userid'] > 0) {
        // BEJELENTKEZETT: látja a 000 és 111 menüpontokat is
        $stmt = $connection->query(
            "SELECT url, nev, szulo, jogosultsag 
             FROM menu 
             WHERE jogosultsag IN ('000', '111')
             ORDER BY sorrend"
        );
    } else {
        // VENDÉG: csak a 000 menüpontokat látja
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


    public static function getMenu($sItems) {
        $submenu = "";
        
        $menu = "<ul class=\"menu\">";
        foreach(self::$menu as $menuindex => $menuitem)       
        {
            if($menuitem[1] == "")
            { $menu.= "<li><a href='".SITE_ROOT.$menuindex."' ".($menuindex==$sItems[0]? "class='selected'":"").">".$menuitem[0]."</a></li>"; }
            else if($menuitem[1] == $sItems[0])
            { $submenu .= "<li><a href='".SITE_ROOT.$sItems[0]."/".$menuindex."' ".($menuindex==$sItems[1]? "class='selected'":"").">".$menuitem[0]."</a></li>"; }
        }
        $menu.="</ul>";
        
        if($submenu != "")
            $submenu = "<ul class=\"menu\">".$submenu."</ul>";
        
        return $menu.$submenu;;
    }
}

Menu::setMenu();
?>
