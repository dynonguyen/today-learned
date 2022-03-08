<!-- Singleton connection -->
<?php
class Connection
{
    private static $instance;
    public $conn = null;

    private function __construct()
    {
        try {
            global $config;
            if (!empty($config['database'])) {
                $db_config = array_filter($config['database']);
                if (empty($db_config)) {
                    throw new Exception("Can't connect DB");
                } else {
                    $dsn = 'mysql:host=' . $db_config['host']  . ';dbname=' . $db_config['db'];
                    $options = [
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ];

                    $this->conn = new PDO($dsn, $db_config['username'], $db_config['password'], $options);
                }
            }
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            exit($msg);
        }
    }

    public static function getConnect(): PDO | null
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance->conn;
    }
}
?>