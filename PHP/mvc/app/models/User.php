<?php
class UserModel
{
    use GetterSetter;

    public static $tableName = 'user';
    private $userid;
    private $name;
    private $password;
    private $status;

    public static function createTableIfNotExist()
    {
        global $config;

        $table = self::$tableName;
        $database = $config['database']['db'];
        $columns = "userid INT PRIMARY KEY, name VARCHAR(50) NOT NULL, password VARCHAR(72) NOT NULL, status SMALLINT NOT NULL";

        $conn = MySQLConnection::getConnect();
        $st = $conn->prepare("CREATE TABLE IF NOT EXISTS $database.$table ($columns)");
        return $st->execute();
    }

    public static function initAdminUser()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE userid = 1";
        $conn = MySQLConnection::getConnect();
        $st = $conn->prepare($sql);
        $st->execute();

        $rowCount = $st->fetchColumn();

        if ($rowCount === 0) {
            $userStatus = USER_STATUS['ACTIVE'];
            $password = 'admin';
            $hashPwd = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
            $sql = "INSERT INTO user (userid, name, password, status) VALUES (1, 'admin', '$hashPwd', $userStatus)";
            $st = $conn->prepare($sql);
            return $st->execute();
        }
    }

    public static function findUserByName($name)
    {
        $sql = "SELECT * FROM user WHERE name = '$name' LIMIT 1";
        $conn = MySQLConnection::getConnect();
        $st = $conn->prepare($sql);
        $st->setFetchMode(PDO::FETCH_CLASS, static::class);
        $st->execute();
        $user =  $st->fetch();
        return $user;
    }
}
