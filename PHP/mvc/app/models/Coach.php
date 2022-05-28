<?php
class CoachModel extends Model
{
    use GetterSetter;

    public static $tableName = 'coach';
    private $CoachID;
    private $CFullName;
    private $YearOfBirth;
    private $Nationality;

    public static function findAllCoachOptions()
    {
        try {
            $conn = MySQLConnection::getConnect();
            $st = $conn->prepare('SELECT CoachID, CFullName FROM coach');
            $st->setFetchMode(PDO::FETCH_CLASS, static::class);
            $st->execute();
            $coachList = $st->fetchAll();
            return $coachList;
        } catch (Exception $ex) {
            error_log($ex);
            return [];
        }
    }
}
