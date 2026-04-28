<?php
    define('HOST', 'idbp.omega.c-host.hu');
    define('DATABASE', 'web1_la02');
    define('USER', 'web1_la02');
    define('PASSWORD', 'weblapjelszo123456789');
    
    class Database {
        public static $connection = FALSE;
        
        public static function getConnection() {
            if (!self::$connection) {
               self::$connection = new PDO(
    'mysql:host=' . HOST . ';port=3306;dbname=' . DATABASE . ';charset=utf8',
    USER,
    PASSWORD,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
            }
            return self::$connection;
        }
    }
?>
