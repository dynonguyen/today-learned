<?php
class StadiumModel extends Model
{
    use GetterSetter;

    public static $tableName = 'stadium';
    private $StadiumID;
    private $SName;
    private $City;
    private $YearOfBeginning;

    public static function findAllStadiumOptions()
    {
        try {
            $conn = MySQLConnection::getConnect();
            $st = $conn->prepare('SELECT StadiumID, SName FROM stadium');
            $st->setFetchMode(PDO::FETCH_CLASS, static::class);
            $st->execute();
            $stadiums = $st->fetchAll();
            return $stadiums;
        } catch (Exception $ex) {
            error_log($ex);
            return [];
        }
    }
}
