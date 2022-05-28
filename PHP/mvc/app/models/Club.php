<?php
class ClubModel extends Model
{
    use GetterSetter;

    public static $tableName = 'club';
    private $ClubID;
    private $ClubName;
    private $Shortname;
    private $StadiumID;
    private $CoachID;

    public static function findAllClubOptions()
    {
        try {
            $conn = MySQLConnection::getConnect();
            $st = $conn->prepare('SELECT ClubID, ClubName FROM club');
            $st->setFetchMode(PDO::FETCH_CLASS, static::class);
            $st->execute();
            $clubs = $st->fetchAll();
            return $clubs;
        } catch (Exception $ex) {
            error_log($ex);
            return [];
        }
    }

    public static function findAllClubs($page = 0, $pageSize = PAGE_SIZE, $orderBy = 'ClubID')
    {
        try {
            $sql = 'SELECT * FROM club AS c, coach AS co, stadium AS s WHERE c.CoachID = co.CoachID AND c.StadiumID = s.StadiumID';
            $docs = self::pagination([
                'query' => $sql,
                'page' => $page, 'pageSize' => $pageSize,
                'orderBy' => $orderBy, 'modelName' => static::class
            ]);
            return $docs;
        } catch (Exception $ex) {
            error_log($ex);
            return [];
        }
    }

    public static function addClub($club)
    {
        try {
            [
                'ClubName' => $ClubName, 'Shortname' => $Shortname, 'StadiumID' => $StadiumID, 'CoachID' => $CoachID
            ] = $club;

            $ClubID = self::getNextID(self::$tableName, 'ClubID');
            $sql = "INSERT INTO club (ClubID, ClubName, Shortname, StadiumID, CoachID) VALUES "
                . "($ClubID, '$ClubName', '$Shortname', '$StadiumID', $CoachID)";

            $conn = MySQLConnection::getConnect();
            $st = $conn->prepare($sql);
            $isSuccess = $st->execute();
            return $isSuccess;
        } catch (Exception $ex) {
            throw new Exception($ex);
        }
    }
}
